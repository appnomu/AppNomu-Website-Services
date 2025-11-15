<?php
/**
 * Application Configuration
 * Loads environment variables from .env file
 */

class Config {
    private static $config = [];
    private static $loaded = false;
    
    /**
     * Load environment variables from .env file
     */
    public static function load() {
        if (self::$loaded) {
            return;
        }
        
        $envFile = dirname(__DIR__) . '/.env';
        
        if (!file_exists($envFile)) {
            // .env file is required for security
            throw new Exception('.env file not found. Please create one using .env.example as a template.');
        }
        
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            // Skip comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            
            // Parse key=value pairs
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Remove quotes if present
                if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                    (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                    $value = substr($value, 1, -1);
                }
                
                self::$config[$key] = $value;
                
                // Also set as environment variable
                if (!getenv($key)) {
                    putenv("$key=$value");
                }
            }
        }
        
        self::$loaded = true;
    }
    
    /**
     * Get configuration value
     */
    public static function get($key, $default = null) {
        self::load();
        return isset(self::$config[$key]) ? self::$config[$key] : $default;
    }
    
    /**
     * Get database configuration
     */
    public static function getDatabase() {
        return [
            'host' => self::get('DB_HOST', 'localhost'),
            'name' => self::get('DB_NAME'),
            'user' => self::get('DB_USER'),
            'pass' => self::get('DB_PASS')
        ];
    }
    
    /**
     * Get email configuration
     */
    public static function getEmail() {
        return [
            'host' => self::get('SMTP_HOST'),
            'port' => self::get('SMTP_PORT', 587),
            'from' => self::get('SMTP_FROM'),
            'password' => self::get('SMTP_PASSWORD')
        ];
    }
    
    /**
     * Get Cloudflare Turnstile configuration
     */
    public static function getTurnstile() {
        return [
            'site_key' => self::get('TURNSTILE_SITE_KEY'),
            'secret_key' => self::get('TURNSTILE_SECRET_KEY')
        ];
    }
    
    /**
     * Get Plagiarism Detection API configuration
     */
    public static function getPlagiarismAPIs() {
        return [
            'copyscape' => [
                'username' => self::get('COPYSCAPE_API_USERNAME'),
                'api_key' => self::get('COPYSCAPE_API_KEY'),
                'enabled' => !empty(self::get('COPYSCAPE_API_KEY')) && 
                            self::get('COPYSCAPE_API_KEY') !== 'your_copyscape_api_key'
            ],
            'google_search' => [
                'api_key' => self::get('GOOGLE_SEARCH_API_KEY'),
                'engine_id' => self::get('GOOGLE_SEARCH_ENGINE_ID'),
                'enabled' => !empty(self::get('GOOGLE_SEARCH_API_KEY')) && 
                            self::get('GOOGLE_SEARCH_API_KEY') !== 'your_google_api_key'
            ],
            'openai' => [
                'api_key' => self::get('OPENAI_API_KEY'),
                'enabled' => !empty(self::get('OPENAI_API_KEY')) && 
                            self::get('OPENAI_API_KEY') !== 'your_openai_api_key'
            ]
        ];
    }
    
    /**
     * Create database connection
     */
    public static function getDatabaseConnection() {
        $db = self::getDatabase();
        
        if (!$db['name'] || !$db['user'] || !$db['pass']) {
            throw new Exception('Database configuration is incomplete. Please check your .env file.');
        }
        
        try {
            $pdo = new PDO(
                "mysql:host={$db['host']};dbname={$db['name']};charset=utf8mb4",
                $db['user'],
                $db['pass'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
            
            return $pdo;
        } catch (PDOException $e) {
            throw new Exception('Database connection failed: ' . $e->getMessage());
        }
    }
}

// Auto-load configuration when this file is included
Config::load();
?>
