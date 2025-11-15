<?php
// Start session for admin authentication
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

// Load configuration
require_once '../config/config.php';

// Initialize variables
$users = [];
$errorMessage = '';
$successMessage = '';

try {
    // Create database connection
    $pdo = Config::getDatabaseConnection();
    
    // Check if admin_users table exists
    $tableExists = false;
    $tables = $pdo->query("SHOW TABLES LIKE 'admin_users'")->fetchAll();
    if (count($tables) > 0) {
        $tableExists = true;
    }
    
    // Create the admin_users table if it doesn't exist
    if (!$tableExists) {
        $pdo->exec("CREATE TABLE admin_users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            role VARCHAR(20) DEFAULT 'admin',
            last_login DATETIME,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
        
        // Insert default admin user with temporary password
        // IMPORTANT: Change this password immediately after first login
        $defaultAdmin = [
            'username' => 'admin',
            'email' => 'info@appnomu.com',
            'password' => password_hash('ChangeMe123!', PASSWORD_DEFAULT),
            'role' => 'admin'
        ];
        
        $stmt = $pdo->prepare("INSERT INTO admin_users (username, email, password, role) VALUES (:username, :email, :password, :role)");
        $stmt->execute($defaultAdmin);
        
        $successMessage = 'Admin users table created successfully.';
    }
    
    // Handle form submissions
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Add new user
        if (isset($_POST['add_user'])) {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'admin';
            
            // Validate inputs
            if (empty($username) || empty($email) || empty($password)) {
                $errorMessage = 'All fields are required.';
            } else {
                // Check if username or email already exists
                $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE username = ? OR email = ?");
                $checkStmt->execute([$username, $email]);
                
                if ($checkStmt->fetchColumn() > 0) {
                    $errorMessage = 'Username or email already exists.';
                } else {
                    // Insert new user
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $insertStmt = $pdo->prepare("INSERT INTO admin_users (username, email, password, role) VALUES (?, ?, ?, ?)");
                    
                    if ($insertStmt->execute([$username, $email, $hashedPassword, $role])) {
                        $successMessage = "User $username has been added successfully.";
                    } else {
                        $errorMessage = 'Failed to add user.';
                    }
                }
            }
        }
        
        // Update user
        if (isset($_POST['update_user'])) {
            $userId = $_POST['user_id'] ?? '';
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'admin';
            
            // Validate inputs
            if (empty($userId) || empty($username) || empty($email)) {
                $errorMessage = 'Required fields cannot be empty.';
            } else {
                // Check if username or email already exists (excluding current user)
                $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE (username = ? OR email = ?) AND id != ?");
                $checkStmt->execute([$username, $email, $userId]);
                
                if ($checkStmt->fetchColumn() > 0) {
                    $errorMessage = 'Username or email already exists for another user.';
                } else {
                    // Update user
                    if (!empty($password)) {
                        // Update with new password
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $updateStmt = $pdo->prepare("UPDATE admin_users SET username = ?, email = ?, password = ?, role = ? WHERE id = ?");
                        $updateStmt->execute([$username, $email, $hashedPassword, $role, $userId]);
                    } else {
                        // Update without changing password
                        $updateStmt = $pdo->prepare("UPDATE admin_users SET username = ?, email = ?, role = ? WHERE id = ?");
                        $updateStmt->execute([$username, $email, $role, $userId]);
                    }
                    
                    $successMessage = "User $username has been updated successfully.";
                }
            }
        }
        
        // Delete user
        if (isset($_POST['delete_user'])) {
            $userId = $_POST['user_id'] ?? '';
            
            // Prevent deleting your own account
            if ($userId == ($_SESSION['admin_id'] ?? '')) {
                $errorMessage = 'You cannot delete your own account.';
            } elseif (!empty($userId)) {
                $deleteStmt = $pdo->prepare("DELETE FROM admin_users WHERE id = ?");
                
                if ($deleteStmt->execute([$userId])) {
                    $successMessage = 'User has been deleted successfully.';
                } else {
                    $errorMessage = 'Failed to delete user.';
                }
            }
        }
    }
    
    // Get all users
    $stmt = $pdo->query("SELECT id, username, email, role, last_login, created_at FROM admin_users ORDER BY username");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $errorMessage = "Database error: " . $e->getMessage();
}

// Set page title for header
$pageTitle = 'Admin Users';

// Include standard website header
include_once '../includes/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include_once __DIR__ . '/includes/admin-sidebar.php'; ?>
        
        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="content-container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Admin Users</h1>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-person-plus"></i> Add New User
                    </button>
                </div>
                
                <?php if (!empty($errorMessage)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?php echo $errorMessage; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?php echo $successMessage; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-people"></i> User Accounts
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Last Login</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($users) > 0): ?>
                                        <?php foreach ($users as $index => $user): ?>
                                            <tr>
                                                <td><?php echo $index + 1; ?></td>
                                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo $user['role'] === 'admin' ? 'primary' : 'secondary'; ?>">
                                                        <?php echo ucfirst($user['role']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php 
                                                    if (!empty($user['last_login'])) {
                                                        echo date('M d, Y H:i', strtotime($user['last_login']));
                                                    } else {
                                                        echo '<span class="text-muted">Never</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button" class="btn btn-outline-primary edit-user-btn" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#editUserModal"
                                                                data-id="<?php echo $user['id']; ?>"
                                                                data-username="<?php echo htmlspecialchars($user['username']); ?>"
                                                                data-email="<?php echo htmlspecialchars($user['email']); ?>"
                                                                data-role="<?php echo $user['role']; ?>">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                        
                                                        <button type="button" class="btn btn-outline-danger delete-user-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteUserModal"
                                                                data-id="<?php echo $user['id']; ?>"
                                                                data-username="<?php echo htmlspecialchars($user['username']); ?>">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <div class="py-4">
                                                    <i class="bi bi-exclamation-circle text-muted fs-3"></i>
                                                    <p class="mt-2 mb-0">No users found</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edit-username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="edit-password" name="password" placeholder="Leave blank to keep current password">
                        <div class="form-text">Leave blank if you don't want to change the password.</div>
                    </div>
                    <div class="mb-3">
                        <label for="edit-role" class="form-label">Role</label>
                        <select class="form-select" id="edit-role" name="role">
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                        </select>
                    </div>
                    <input type="hidden" id="edit-user-id" name="user_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_user" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the user <strong id="delete-user-name"></strong>?</p>
                    <p class="text-danger"><i class="bi bi-exclamation-triangle-fill me-2"></i> This action cannot be undone.</p>
                    <input type="hidden" id="delete-user-id" name="user_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_user" class="btn btn-danger">Delete User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Populate edit user modal
    document.addEventListener('DOMContentLoaded', function() {
        // Handle edit user button clicks
        const editUserBtns = document.querySelectorAll('.edit-user-btn');
        editUserBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const userId = this.dataset.id;
                const username = this.dataset.username;
                const email = this.dataset.email;
                const role = this.dataset.role;
                
                document.getElementById('edit-user-id').value = userId;
                document.getElementById('edit-username').value = username;
                document.getElementById('edit-email').value = email;
                document.getElementById('edit-role').value = role;
                document.getElementById('edit-password').value = '';
            });
        });
        
        // Handle delete user button clicks
        const deleteUserBtns = document.querySelectorAll('.delete-user-btn');
        deleteUserBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const userId = this.dataset.id;
                const username = this.dataset.username;
                
                document.getElementById('delete-user-id').value = userId;
                document.getElementById('delete-user-name').textContent = username;
            });
        });
    });
</script>

<?php include_once '../includes/footer.php'; ?>
