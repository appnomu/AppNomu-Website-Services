<?php
/**
 * Centralized brand helper for AppNomu CodeLab (CodeLab.ug)
 */
class Brand {
    public const NAME = 'AppNomu CodeLab';
    public const SHORT_NAME = 'CodeLab.ug';
    public const LEGAL_NAME = 'AppNomu CodeLab (CodeLab.ug)';
    public const TAGLINE = 'AppNomu CodeLab | Africa’s Digital Lab';
    public const WEBSITE = 'https://services.appnomu.com';
    public const SUPPORT_EMAIL = 'info@appnomu.com';
    public const LOGO_URL = 'https://services.appnomu.com/assets/images/CodeLab%20Yellow.png';
    public const FAVICON_URL = 'https://services.appnomu.com/assets/images/Favicon_CodeLab.png';
    public const OG_IMAGE_URL = 'https://services.appnomu.com/assets/images/Favicon_CodeLab.png';

    private static bool $bufferActive = false;

    /**
     * Convenience helper for replacing legacy brand mentions inside strings.
     */
    public static function refreshCopy(string $text): string {
        $replacements = [
            'AppNomu Sales Lab Technology Limited' => self::LEGAL_NAME,
            'AppNomu Business Services' => self::NAME,
            'AppNomu Sales Lab' => self::NAME,
            'AppNomu' => self::NAME,
            'APPNOMU' => strtoupper(self::NAME),
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $text);
    }

    /**
     * Start an output buffer that automatically refreshes copy on flush.
     */
    public static function startBuffer(): void {
        if (!self::$bufferActive) {
            ob_start([self::class, 'applyBranding']);
            self::$bufferActive = true;
        }
    }

    /**
     * Flush the branding buffer if it is active.
     */
    public static function flushBuffer(): void {
        if (self::$bufferActive && ob_get_level() > 0) {
            ob_end_flush();
            self::$bufferActive = false;
        }
    }

    /**
     * Callback used by the output buffer.
     */
    public static function applyBranding(string $content): string {
        return self::refreshCopy($content);
    }
}
