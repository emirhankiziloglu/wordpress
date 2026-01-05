/**
 * Plugin Name: Modern Admin UI
 * Description: Transforms WordPress admin into a modern, Tailwind/shadcn-inspired dashboard
 * Version: 2.0.0
 * Author: Emirhan Kızıloğlu
 * License: GPL-2.0+
 * 
 * PHP Code for Code Snippets Plugin
 * Based on WordPress core CSS analysis for precise selector targeting
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue modern admin styles
 */
function modern_admin_ui_enqueue_styles() {
    if (!is_admin()) {
        return;
    }

    $css = '
    /* ==========================================================================
       MODERN ADMIN UI v2.0 - CSS VARIABLES (Design Tokens)
       Emulating Tailwind/shadcn/Vercel design system
       Based on WordPress core CSS analysis
       ========================================================================== */

    :root {
        /* Slate color palette (neutral gray scale) */
        --slate-50: #f8fafc;
        --slate-100: #f1f5f9;
        --slate-200: #e2e8f0;
        --slate-300: #cbd5e1;
        --slate-400: #94a3b8;
        --slate-500: #64748b;
        --slate-600: #475569;
        --slate-700: #334155;
        --slate-800: #1e293b;
        --slate-900: #0f172a;
        --slate-950: #020617;

        /* Accent colors */
        --primary: #3b82f6;
        --primary-hover: #2563eb;
        --primary-dark: #1d4ed8;
        --primary-light: #eff6ff;
        --primary-focus-ring: rgba(59, 130, 246, 0.25);
        
        --success: #22c55e;
        --success-light: #f0fdf4;
        --success-border: #86efac;
        
        --warning: #f59e0b;
        --warning-light: #fffbeb;
        --warning-border: #fcd34d;
        
        --error: #ef4444;
        --error-light: #fef2f2;
        --error-border: #fca5a5;
        
        --info: #06b6d4;
        --info-light: #ecfeff;
        --info-border: #67e8f9;

        /* Spacing scale (4px base rhythm) */
        --space-0: 0;
        --space-1: 0.25rem;
        --space-2: 0.5rem;
        --space-3: 0.75rem;
        --space-4: 1rem;
        --space-5: 1.25rem;
        --space-6: 1.5rem;
        --space-8: 2rem;
        --space-10: 2.5rem;
        --space-12: 3rem;

        /* Border radius */
        --radius-sm: 4px;
        --radius-md: 6px;
        --radius-lg: 8px;
        --radius-xl: 12px;
        --radius-2xl: 16px;
        --radius-full: 9999px;

        /* Shadows */
        --shadow-xs: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-sm: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --shadow-focus: 0 0 0 2px var(--primary-focus-ring);

        /* Typography */
        --font-sans: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
        --font-mono: "JetBrains Mono", "Fira Code", Consolas, monospace;

        /* Transitions */
        --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
        --transition-base: 200ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ==========================================================================
       BASE RESET & TYPOGRAPHY
       Override: body (common.css line 221-228)
       ========================================================================== */

    body {
        background: var(--slate-100);
        font-family: var(--font-sans);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Override: #wpcontent (common.css line 10-13) - maintain left padding */
    #wpcontent {
        padding-left: 20px;
        background: var(--slate-50);
    }

    /* Override: #wpbody-content (common.css line 25-30) */
    #wpbody-content {
        padding-bottom: 65px;
        float: left;
        width: 100%;
        overflow: visible;
    }

    /* Override: .wrap (common.css line 581-583) */
    .wrap {
        margin: 10px 20px 0 2px;
        max-width: none;
    }

    /* Override: h1 in wrap (common.css line 585-594) */
    .wrap > h2:first-child,
    .wrap [class$="icon32"] + h2,
    .postbox .inside h2,
    .wrap h1 {
        font-size: 24px;
        font-weight: 600;
        color: var(--slate-900);
        letter-spacing: -0.025em;
        margin: 0;
        padding: 9px 0 4px;
        line-height: 1.3;
    }

    .wrap h2 {
        font-size: 18px;
        font-weight: 600;
        color: var(--slate-800);
    }

    /* ==========================================================================
       ADMIN SIDEBAR - #adminmenu
       Override: admin-menu.css
       Core widths: 160px normal, 36px folded
       ========================================================================== */

    /* Override: (admin-menu.css line 1-7) */
    #adminmenuback,
    #adminmenuwrap,
    #adminmenu,
    #adminmenu .wp-submenu {
        width: 160px;
        background-color: var(--slate-900);
    }

    /* Fixed sidebar background */
    #adminmenuback {
        position: fixed;
        top: 0;
        bottom: -120px;
        z-index: 1;
        background: var(--slate-900);
    }

    /* Override: folded state (admin-menu.css line 35-40) */
    .folded #adminmenuback,
    .folded #adminmenuwrap,
    .folded #adminmenu,
    .folded #adminmenu li.menu-top {
        width: 36px;
    }

    /* Override: #adminmenu (admin-menu.css line 28-33) */
    #adminmenu {
        clear: left;
        margin: 12px 0;
        padding: 0;
        list-style: none;
    }

    /* Custom logo area at top of sidebar */
    .admin-logo-container {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 12px 12px;
        border-bottom: 1px solid var(--slate-700);
        margin-bottom: 4px;
    }

    .admin-logo-container img {
        max-width: 120px;
        height: 28px;
        width: auto;
        object-fit: contain;
    }

    .admin-logo-container .logo-text {
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: -0.025em;
    }

    .folded .admin-logo-container {
        padding: 10px 6px;
        justify-content: center;
    }

    .folded .admin-logo-container img {
        max-width: 24px;
        max-height: 24px;
    }

    .folded .admin-logo-container .logo-text {
        display: none;
    }

    #adminmenu * {
        font-family: var(--font-sans);
    }

    /* Override: menu links (admin-menu.css line 82-87) */
    #adminmenu a {
        display: block;
        line-height: 1.3;
        padding: 2px 5px;
        color: var(--slate-300);
        transition: all var(--transition-fast);
    }

    /* Override: submenu links (admin-menu.css line 89-96) */
    #adminmenu .wp-submenu a {
        color: var(--slate-400);
        font-size: 13px;
        line-height: 1.4;
        margin: 0;
        padding: 5px 0;
    }

    /* Override: hover states (admin-menu.css line 98-108) */
    #adminmenu .wp-submenu a:hover,
    #adminmenu .wp-submenu a:focus {
        background: none;
        color: #fff;
    }

    #adminmenu a:hover,
    #adminmenu li.menu-top > a:focus,
    #adminmenu .wp-submenu a:hover,
    #adminmenu .wp-submenu a:focus {
        color: #fff;
    }

    /* Override: hover box-shadow (admin-menu.css line 110-115) - remove left border effect */
    #adminmenu a:hover,
    #adminmenu a:focus,
    .folded #adminmenu .wp-submenu-head:hover {
        box-shadow: none;
    }

    /* Override: menu-top (admin-menu.css line 117-121) */
    #adminmenu li.menu-top {
        border: none;
        min-height: 34px;
        position: relative;
    }

    /* Override: submenu flyout (admin-menu.css line 123-134) */
    #adminmenu .wp-submenu {
        list-style: none;
        position: absolute;
        top: -1000em;
        left: 160px;
        overflow: visible;
        word-wrap: break-word;
        padding: var(--space-2) 0;
        z-index: 9999;
        background-color: var(--slate-800);
        box-shadow: var(--shadow-lg);
        border-radius: 0 var(--radius-md) var(--radius-md) 0;
        border: 1px solid var(--slate-700);
        border-left: none;
    }

    /* Folded submenu positioning */
    .folded #adminmenu .wp-submenu.sub-open,
    .folded #adminmenu .opensub .wp-submenu,
    .folded #adminmenu .wp-has-current-submenu .wp-submenu.sub-open,
    .folded #adminmenu .wp-has-current-submenu.opensub .wp-submenu,
    .folded #adminmenu a.menu-top:focus + .wp-submenu,
    .folded #adminmenu .wp-has-current-submenu a.menu-top:focus + .wp-submenu,
    .no-js.folded #adminmenu .wp-has-submenu:hover .wp-submenu {
        top: 0;
        left: 36px;
    }

    /* Override: menu-top hover state (admin-menu.css line 167-173) */
    #adminmenu li.menu-top:hover,
    #adminmenu li.opensub > a.menu-top,
    #adminmenu li > a.menu-top:focus {
        position: relative;
        background-color: var(--slate-800);
        color: #fff;
    }

    /* Override: current/active menu (admin-menu.css line 181-186) */
    #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,
    #adminmenu li.current a.menu-top,
    #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head {
        background: var(--primary);
        color: #fff;
    }

    /* Current submenu positioning */
    #adminmenu .wp-has-current-submenu .wp-submenu,
    .no-js li.wp-has-current-submenu:hover .wp-submenu,
    #adminmenu .wp-has-current-submenu .wp-submenu.sub-open,
    #adminmenu .wp-has-current-submenu.opensub .wp-submenu {
        position: relative;
        z-index: 3;
        top: auto;
        left: auto;
        right: auto;
        bottom: auto;
        border: 0 none;
        margin-top: 0;
        box-shadow: none;
        border-radius: 0;
        background: var(--slate-800);
    }

    /* Submenu items */
    #adminmenu .wp-submenu li.current,
    #adminmenu .wp-submenu li.current a,
    #adminmenu .opensub .wp-submenu li.current a,
    #adminmenu a.wp-has-current-submenu:focus + .wp-submenu li.current a,
    #adminmenu .wp-submenu li.current a:hover,
    #adminmenu .wp-submenu li.current a:focus {
        color: #fff;
    }

    /* Override: menu name padding (admin-menu.css line 267-274) */
    #adminmenu div.wp-menu-name {
        padding: 8px 8px 8px 36px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        word-break: break-word;
        hyphens: auto;
    }

    /* Override: menu icon (admin-menu.css line 276-282) */
    #adminmenu div.wp-menu-image {
        float: left;
        width: 36px;
        height: 34px;
        margin: 0;
        text-align: center;
    }

    /* Override: menu icon color (admin-menu.css line 290-300) */
    div.wp-menu-image:before,
    #adminmenu div.wp-menu-image:before {
        color: var(--slate-400);
        padding: 7px 0;
        transition: color var(--transition-fast);
    }

    #adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before,
    #adminmenu .wp-has-current-submenu div.wp-menu-image:before,
    #adminmenu .current div.wp-menu-image:before,
    #adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before,
    #adminmenu a.current:hover div.wp-menu-image:before,
    #adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before,
    #adminmenu li.wp-has-current-submenu.opensub div.wp-menu-image:before {
        color: #fff;
    }

    #adminmenu li:hover div.wp-menu-image:before,
    #adminmenu li a:focus div.wp-menu-image:before,
    #adminmenu li.opensub div.wp-menu-image:before {
        color: var(--slate-100);
    }

    /* Override: separator (admin-menu.css line 395-400) */
    #adminmenu li.wp-menu-separator {
        height: 1px;
        padding: 0;
        margin: var(--space-2) var(--space-3);
        cursor: inherit;
        background: var(--slate-700);
    }

    #adminmenu div.separator {
        height: 1px;
        padding: 0;
        background: var(--slate-700);
    }

    /* Override: notification bubbles (admin-menu.css line 425-442) */
    #adminmenu .menu-counter,
    #adminmenu .awaiting-mod,
    #adminmenu .update-plugins {
        display: inline-block;
        vertical-align: top;
        box-sizing: border-box;
        margin: 1px 0 -1px 2px;
        padding: 0 5px;
        min-width: 18px;
        height: 18px;
        border-radius: var(--radius-full);
        background-color: var(--error);
        color: #fff;
        font-size: 11px;
        line-height: 1.6;
        text-align: center;
        z-index: 26;
    }

    /* Override: collapse button (admin-menu.css line 454-466) */
    #collapse-button {
        display: block;
        width: 100%;
        height: 34px;
        margin: 0;
        border: none;
        padding: 0;
        position: relative;
        overflow: visible;
        background: none;
        color: var(--slate-400);
        cursor: pointer;
        border-top: 1px solid var(--slate-700);
    }

    #collapse-button:hover,
    #collapse-button:focus {
        color: #fff;
    }

    /* Remove the arrow indicator on current menu */
    ul#adminmenu a.wp-has-current-submenu:after,
    ul#adminmenu > li.current > a.current:after {
        border-right-color: var(--slate-50);
    }

    /* ==========================================================================
       ADMIN TOP BAR - #wpadminbar
       Override: admin-bar.css
       ========================================================================== */

    #wpadminbar {
        background: var(--slate-950);
        box-shadow: var(--shadow-sm);
    }

    #wpadminbar * {
        font-family: var(--font-sans);
    }

    #wpadminbar .ab-item,
    #wpadminbar a.ab-item,
    #wpadminbar > #wp-toolbar span.ab-label,
    #wpadminbar > #wp-toolbar span.noticon {
        color: var(--slate-300);
        font-size: 13px;
    }

    #wpadminbar:not(.mobile) .ab-top-menu > li:hover > .ab-item,
    #wpadminbar:not(.mobile) .ab-top-menu > li > .ab-item:focus,
    #wpadminbar.nojq .quicklinks .ab-top-menu > li > .ab-item:focus,
    #wpadminbar .ab-top-menu > li.hover > .ab-item {
        background: var(--slate-800);
        color: #fff;
    }

    #wpadminbar .ab-submenu,
    #wpadminbar .ab-sub-wrapper {
        background: var(--slate-800);
        border-radius: 0 0 var(--radius-md) var(--radius-md);
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--slate-700);
        border-top: none;
    }

    #wpadminbar .quicklinks .menupop ul li a,
    #wpadminbar .quicklinks .menupop ul li a strong,
    #wpadminbar .quicklinks .menupop.hover ul li a {
        color: var(--slate-300);
    }

    #wpadminbar .quicklinks .menupop ul li a:hover,
    #wpadminbar .quicklinks .menupop ul li a:focus {
        background: var(--slate-700);
        color: #fff;
    }

    /* ==========================================================================
       BUTTONS
       Override: buttons.css / forms.css
       ========================================================================== */

    /* Primary button */
    .wp-core-ui .button-primary {
        background: var(--primary);
        border: 1px solid var(--primary);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        color: #fff;
        font-family: var(--font-sans);
        font-size: 13px;
        font-weight: 500;
        padding: 0 12px;
        height: 32px;
        line-height: 30px;
        transition: all var(--transition-fast);
        text-decoration: none;
    }

    .wp-core-ui .button-primary:hover,
    .wp-core-ui .button-primary:focus {
        background: var(--primary-hover);
        border-color: var(--primary-hover);
        color: #fff;
    }

    .wp-core-ui .button-primary:focus {
        box-shadow: var(--shadow-focus);
        outline: 2px solid transparent;
    }

    .wp-core-ui .button-primary:active {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    .wp-core-ui .button-primary:disabled,
    .wp-core-ui .button-primary[disabled] {
        background: var(--slate-300) !important;
        border-color: var(--slate-300) !important;
        color: var(--slate-500) !important;
        cursor: not-allowed;
    }

    /* Secondary button - Override: forms.css select styles used as base */
    .wp-core-ui .button,
    .wp-core-ui .button-secondary {
        background: #fff;
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-xs);
        color: var(--slate-700);
        font-family: var(--font-sans);
        font-size: 13px;
        font-weight: 500;
        padding: 0 12px;
        height: 32px;
        line-height: 30px;
        transition: all var(--transition-fast);
    }

    .wp-core-ui .button:hover,
    .wp-core-ui .button-secondary:hover {
        background: var(--slate-50);
        border-color: var(--slate-400);
        color: var(--slate-900);
    }

    .wp-core-ui .button:focus,
    .wp-core-ui .button-secondary:focus {
        border-color: var(--primary);
        box-shadow: var(--shadow-focus);
        outline: 2px solid transparent;
    }

    /* Page title action button - Override: common.css line 619-643 */
    .wrap .add-new-h2,
    .wrap .add-new-h2:active,
    .wrap .page-title-action,
    .wrap .page-title-action:active {
        display: inline-block;
        position: relative;
        box-sizing: border-box;
        cursor: pointer;
        white-space: nowrap;
        text-decoration: none;
        text-shadow: none;
        top: -3px;
        margin-left: 4px;
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md);
        background: #fff;
        font-size: 13px;
        font-weight: 500;
        line-height: 2.15384615;
        color: var(--slate-700);
        padding: 0 10px;
        min-height: 30px;
        -webkit-appearance: none;
        box-shadow: var(--shadow-xs);
        transition: all var(--transition-fast);
    }

    .wrap .add-new-h2:hover,
    .wrap .page-title-action:hover {
        background: var(--slate-50);
        border-color: var(--slate-400);
        color: var(--slate-900);
    }

    .wrap .page-title-action:focus {
        border-color: var(--primary);
        box-shadow: var(--shadow-focus);
        outline: 2px solid transparent;
    }

    /* Link button */
    .wp-core-ui .button-link {
        color: var(--primary);
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
    }

    .wp-core-ui .button-link:hover,
    .wp-core-ui .button-link:focus {
        color: var(--primary-hover);
        text-decoration: underline;
    }

    /* Delete/Destructive - Override: common.css line 881-895 */
    .row-actions span.delete a,
    .row-actions span.trash a,
    .row-actions span.spam a,
    .plugins a.delete,
    .submitbox .submitdelete,
    #media-items a.delete,
    .wp-core-ui .button-link-delete {
        color: var(--error);
    }

    .row-actions .delete a:hover,
    .row-actions .trash a:hover,
    .submitbox .submitdelete:hover,
    .wp-core-ui .button-link-delete:hover {
        color: #dc2626;
    }

    /* ==========================================================================
       FORM INPUTS
       Override: forms.css
       ========================================================================== */

    /* Override: forms.css line 34-55 */
    input[type="text"],
    input[type="password"],
    input[type="color"],
    input[type="date"],
    input[type="datetime"],
    input[type="datetime-local"],
    input[type="email"],
    input[type="month"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    input[type="week"],
    select,
    textarea {
        box-shadow: var(--shadow-xs);
        border-radius: var(--radius-md);
        border: 1px solid var(--slate-300);
        background-color: #fff;
        color: var(--slate-900);
        font-family: var(--font-sans);
        transition: all var(--transition-fast);
    }

    /* Override: forms.css line 57-75 */
    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="datetime-local"],
    input[type="email"],
    input[type="month"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    input[type="week"] {
        padding: 0 8px;
        font-size: 14px;
        line-height: 2;
        min-height: 32px;
    }

    /* Override: focus states (forms.css line 82-104) */
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="color"]:focus,
    input[type="date"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="email"]:focus,
    input[type="month"]:focus,
    input[type="number"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="time"]:focus,
    input[type="url"]:focus,
    input[type="week"]:focus,
    input[type="checkbox"]:focus,
    input[type="radio"]:focus,
    select:focus,
    textarea:focus {
        border-color: var(--primary);
        box-shadow: var(--shadow-focus);
        outline: 2px solid transparent;
    }

    /* Override: checkbox/radio (forms.css line 112-133) */
    input[type="checkbox"],
    input[type="radio"] {
        border: 1px solid var(--slate-400);
        border-radius: var(--radius-sm);
        background: #fff;
        color: var(--slate-600);
        clear: none;
        cursor: pointer;
        display: inline-block;
        line-height: 0;
        height: 1rem;
        margin: -0.25rem 0.25rem 0 0;
        outline: 0;
        padding: 0 !important;
        text-align: center;
        vertical-align: middle;
        width: 1rem;
        min-width: 1rem;
        -webkit-appearance: none;
        box-shadow: none;
        transition: border-color var(--transition-fast);
    }

    input[type="radio"] {
        border-radius: 50%;
    }

    input[type="checkbox"]:checked,
    input[type="radio"]:checked {
        background: var(--primary);
        border-color: var(--primary);
    }

    /* Checkbox/radio checked icons - white color for visibility */
    input[type="checkbox"]:checked::before,
    input[type="radio"]:checked::before {
        float: left;
        display: inline-block;
        vertical-align: middle;
        width: 1rem;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    input[type="checkbox"]:checked::before {
        /* White checkmark SVG */
        content: url("data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M14.83%204.89l1.34.94-5.81%208.38H9.02L5.78%209.67l1.34-1.25%202.57%202.4z%27%20fill%3D%27%23ffffff%27%2F%3E%3C%2Fsvg%3E");
        margin: -0.1875rem 0 0 -0.25rem;
        height: 1.3125rem;
        width: 1.3125rem;
    }

    input[type="radio"]:checked::before {
        content: "";
        border-radius: 50%;
        width: 0.5rem;
        height: 0.5rem;
        margin: 0.1875rem;
        background-color: #fff;
        line-height: 1.14285714;
    }

    /* Override: select (forms.css line 308-324) */
    .wp-core-ui select {
        font-size: 14px;
        line-height: 2;
        color: var(--slate-700);
        border: 1px solid var(--slate-300);
        box-shadow: var(--shadow-xs);
        border-radius: var(--radius-md);
        padding: 0 24px 0 8px;
        min-height: 32px;
        max-width: 25rem;
        -webkit-appearance: none;
        background: #fff url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2220%22%20height%3D%2220%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M5%206l5%205%205-5%202%201-7%207-7-7%202-1z%22%20fill%3D%22%23475569%22%2F%3E%3C%2Fsvg%3E") no-repeat right 5px top 55%;
        background-size: 16px 16px;
        cursor: pointer;
        vertical-align: middle;
        transition: all var(--transition-fast);
    }

    .wp-core-ui select:hover {
        border-color: var(--slate-400);
        color: var(--slate-900);
    }

    .wp-core-ui select:focus {
        border-color: var(--primary);
        box-shadow: var(--shadow-focus);
        color: var(--slate-900);
    }

    /* Labels */
    label {
        font-family: var(--font-sans);
        font-size: 13px;
        font-weight: 500;
        color: var(--slate-700);
    }

    /* Placeholder */
    ::placeholder {
        color: var(--slate-400);
    }

    /* ==========================================================================
       TABLES (List Tables)
       Override: common.css .widefat / list-tables.css
       ========================================================================== */

    /* Override: common.css line 183-200 */
    .widget-top,
    .menu-item-handle,
    .widget-inside,
    #menu-settings-column .accordion-container,
    #menu-management .menu-edit,
    .manage-menus,
    table.widefat,
    .stuffbox,
    p.popular-tags,
    .widgets-holder-wrap,
    .wp-editor-container,
    .popular-tags,
    .feature-filter,
    .comment-ays {
        border: 1px solid var(--slate-200);
        box-shadow: var(--shadow-sm);
        border-radius: var(--radius-lg);
    }

    table.widefat,
    .wp-editor-container,
    .stuffbox,
    p.popular-tags,
    .widgets-holder-wrap,
    .popular-tags,
    .feature-filter,
    .comment-ays {
        background: #fff;
    }

    /* Table styling */
    .widefat {
        border-spacing: 0;
        width: 100%;
        clear: both;
        margin: 0;
    }

    .widefat td,
    .widefat th {
        padding: var(--space-3) var(--space-4);
    }

    /* Override: check-column (common.css line 529-550) */
    .widefat .check-column {
        width: 2.5em;
        padding: 8px 8px 8px 10px;
        vertical-align: top;
        text-align: center;
    }

    .widefat tbody th.check-column {
        padding: 12px 8px 12px 10px;
    }

    .widefat thead td.check-column,
    .widefat tbody th.check-column,
    .updates-table tbody td.check-column,
    .widefat tfoot td.check-column {
        padding: 10px 8px 10px 10px;
    }

    .widefat thead td.check-column,
    .widefat tfoot td.check-column {
        padding-top: 8px;
        vertical-align: middle;
    }

    /* Remove hover background on check column */
    .check-column label:hover,
    .check-column input:hover + label {
        background: transparent;
    }

    /* Override: header/footer (common.css line 485-494) */
    .widefat thead th,
    .widefat thead td {
        border-bottom: 1px solid var(--slate-200);
        background: var(--slate-50);
        color: var(--slate-600);
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .widefat tfoot th,
    .widefat tfoot td {
        border-top: 1px solid var(--slate-200);
        border-bottom: none;
        background: var(--slate-50);
    }

    /* Table cells */
    .widefat td {
        vertical-align: top;
        font-size: 13px;
        line-height: 1.5em;
        color: var(--slate-700);
    }

    /* Override: alternating rows (common.css line 700-704) */
    .striped > tbody > :nth-child(odd),
    ul.striped > :nth-child(odd),
    .alternate {
        background-color: transparent;
    }

    /* Hover state for table rows */
    .wp-list-table tbody tr:hover td,
    .wp-list-table tbody tr:hover th {
        background: var(--slate-50);
    }

    /* Row actions */
    .row-actions {
        color: var(--slate-400);
        font-size: 12px;
        visibility: hidden;
    }

    tr:hover .row-actions,
    tr:focus-within .row-actions {
        visibility: visible;
    }

    .row-actions a {
        color: var(--primary);
    }

    .row-actions a:hover {
        color: var(--primary-hover);
    }

    /* Column title */
    td.column-title strong,
    td.plugin-title strong {
        display: block;
        margin-bottom: 0.2em;
        font-size: 14px;
        font-weight: 500;
        color: var(--slate-900);
    }

    .wp-list-table .column-title .row-title,
    .wp-list-table .column-title .row-title:visited {
        color: var(--slate-900);
        font-weight: 500;
    }

    .wp-list-table .column-title .row-title:hover {
        color: var(--primary);
    }

    /* Border radius on first/last cells */
    .widefat thead th:first-child,
    .wp-list-table thead th:first-child {
        border-top-left-radius: var(--radius-lg);
    }

    .widefat thead th:last-child,
    .wp-list-table thead th:last-child {
        border-top-right-radius: var(--radius-lg);
    }

    /* Sorting indicators vertical alignment */
    .wp-list-table th.sortable a,
    .wp-list-table th.sorted a {
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* Hide the original :before pseudo-element icons */
    .sorting-indicator:before {
        display: none !important;
    }

    .sorting-indicators {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        vertical-align: middle;
        height: 14px;
        line-height: 1;
        gap: 1px;
    }

    .sorting-indicator {
        display: block;
        width: 0;
        height: 0;
        margin: 0;
        padding: 0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
    }

    .sorting-indicator.asc {
        border-bottom: 4px solid var(--slate-400);
    }

    .sorting-indicator.desc {
        border-top: 4px solid var(--slate-400);
    }

    .wp-list-table th.sorted.asc .sorting-indicator.asc {
        border-bottom-color: var(--primary);
    }

    .wp-list-table th.sorted.desc .sorting-indicator.desc {
        border-top-color: var(--primary);
    }

    /* Override: tablenav (list-tables.css line 675-681) */
    .tablenav {
        clear: both;
        height: auto;
        min-height: 30px;
        margin: var(--space-4) 0;
        padding-top: 5px;
        vertical-align: middle;
    }

    .tablenav .tablenav-pages {
        float: right;
        margin: 0 0 9px;
        color: var(--slate-600);
        font-size: 13px;
    }

    /* Pagination buttons */
    .tablenav .tablenav-pages .button,
    .tablenav .tablenav-pages .tablenav-pages-navspan {
        display: inline-block;
        vertical-align: baseline;
        min-width: 30px;
        min-height: 30px;
        margin: 0;
        padding: 0 4px;
        font-size: 14px;
        line-height: 1.8;
        text-align: center;
        border-radius: var(--radius-md);
    }

    /* Bulk actions */
    .tablenav .actions select {
        float: left;
        margin-right: 6px;
        max-width: 12.5rem;
        min-height: 32px;
    }

    /* Tablenav action buttons (Apply, Filter) - forms.css #doaction */
    .tablenav .actions .button,
    #doaction,
    #doaction2,
    #post-query-submit,
    .tablenav .actions input[type="submit"] {
        background: #fff;
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-xs);
        color: var(--slate-700);
        font-family: var(--font-sans);
        font-size: 13px;
        font-weight: 500;
        padding: 0 12px;
        height: 32px;
        line-height: 30px;
        margin: 0 4px 0 0;
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .tablenav .actions .button:hover,
    #doaction:hover,
    #doaction2:hover,
    #post-query-submit:hover,
    .tablenav .actions input[type="submit"]:hover {
        background: var(--slate-50);
        border-color: var(--slate-400);
        color: var(--slate-900);
    }

    .tablenav .actions .button:focus,
    #doaction:focus,
    #doaction2:focus,
    #post-query-submit:focus,
    .tablenav .actions input[type="submit"]:focus {
        border-color: var(--primary);
        box-shadow: var(--shadow-focus);
        outline: 2px solid transparent;
    }

    /* Search box styling */
    .search-box {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .search-box input[type="search"],
    .search-box input[type="text"],
    #post-search-input,
    #product-search-input {
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md);
        padding: 6px 12px;
        height: 32px;
        font-size: 13px;
        background: #fff;
        box-shadow: var(--shadow-xs);
        transition: all var(--transition-fast);
    }

    .search-box input[type="search"]:focus,
    .search-box input[type="text"]:focus,
    #post-search-input:focus,
    #product-search-input:focus {
        border-color: var(--primary);
        box-shadow: var(--shadow-focus);
        outline: none;
    }

    /* Search submit button */
    .search-box input[type="submit"],
    #search-submit,
    input#search-submit.button {
        background: var(--primary) !important;
        border: 1px solid var(--primary) !important;
        border-radius: var(--radius-md) !important;
        box-shadow: var(--shadow-sm) !important;
        color: #fff !important;
        font-family: var(--font-sans);
        font-size: 13px;
        font-weight: 500;
        padding: 0 16px;
        height: 32px;
        line-height: 30px;
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .search-box input[type="submit"]:hover,
    #search-submit:hover,
    input#search-submit.button:hover {
        background: var(--primary-hover) !important;
        border-color: var(--primary-hover) !important;
    }

    .search-box input[type="submit"]:focus,
    #search-submit:focus,
    input#search-submit.button:focus {
        box-shadow: var(--shadow-focus) !important;
        outline: 2px solid transparent;
    }

    /* ==========================================================================
       SUBSUBSUB NAVIGATION (Filter Links)
       Override: common.css line 430-461
       ========================================================================== */

    .subsubsub {
        list-style: none;
        margin: 8px 0 0;
        padding: 0;
        font-size: 13px;
        float: left;
        color: var(--slate-500);
    }

    .subsubsub li {
        display: inline-block;
        margin: 0;
        padding: 0;
        white-space: nowrap;
    }

    .subsubsub a {
        line-height: 2;
        padding: var(--space-1) var(--space-2);
        text-decoration: none;
        border-radius: var(--radius-md);
        color: var(--slate-600);
        transition: all var(--transition-fast);
    }

    .subsubsub a:hover {
        background: var(--slate-100);
        color: var(--slate-900);
    }

    .subsubsub a.current {
        font-weight: 600;
        color: var(--slate-900);
        background: var(--slate-200);
    }

    .subsubsub a .count,
    .subsubsub a.current .count {
        color: var(--slate-500);
        font-weight: 400;
        font-size: 12px;
    }

    /* ==========================================================================
       NOTICES & MESSAGES
       Override: based on default WordPress notice system
       ========================================================================== */

    .notice,
    div.updated,
    div.error,
    .update-nag,
    .settings-error {
        border: none;
        border-radius: var(--radius-lg);
        padding: var(--space-4);
        margin: 5px 0 15px;
        box-shadow: var(--shadow-sm);
        border-left: 4px solid;
        background: #fff;
    }

    .notice p,
    div.updated p,
    div.error p {
        font-size: 13px;
        margin: 0.5em 0;
        padding: 2px;
    }

    /* Success notice */
    .notice-success,
    div.updated:not(.error) {
        background: var(--success-light);
        border-left-color: var(--success);
    }

    .notice-success p,
    div.updated:not(.error) p {
        color: #166534;
    }

    /* Error notice */
    .notice-error,
    div.error,
    .settings-error.error {
        background: var(--error-light);
        border-left-color: var(--error);
    }

    .notice-error p,
    div.error p {
        color: #991b1b;
    }

    /* Warning notice */
    .notice-warning,
    .update-nag {
        background: var(--warning-light);
        border-left-color: var(--warning);
    }

    .notice-warning p,
    .update-nag {
        color: #92400e;
    }

    /* Info notice */
    .notice-info {
        background: var(--info-light);
        border-left-color: var(--info);
    }

    .notice-info p {
        color: #0e7490;
    }

    /* Dismiss button */
    .notice-dismiss {
        padding: var(--space-4);
    }

    .notice-dismiss:before {
        color: var(--slate-400);
        transition: color var(--transition-fast);
    }

    .notice-dismiss:hover:before,
    .notice-dismiss:focus:before {
        color: var(--slate-600);
    }

    /* ==========================================================================
       CARDS & POSTBOXES (Meta Boxes)
       Override: edit.css / common.css
       ========================================================================== */

    /* Override: edit.css line 185-191 */
    .postbox {
        position: relative;
        min-width: 255px;
        border: 1px solid var(--slate-200);
        box-shadow: var(--shadow-sm);
        background: #fff;
        border-radius: var(--radius-lg);
        margin-bottom: var(--space-4);
    }

    .postbox .hndle,
    .postbox .postbox-header {
        background: #fff;
        border-bottom: 1px solid var(--slate-100);
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        padding: var(--space-3) var(--space-4);
    }

    /* Override: edit.css line 652-659 */
    #poststuff h3.hndle,
    #poststuff .stuffbox > h3,
    #poststuff h2 {
        font-size: 14px;
        font-weight: 600;
        color: var(--slate-800);
        padding: 8px 12px;
        margin: 0;
        line-height: 1.4;
    }

    .postbox .inside {
        margin: 0;
        padding: var(--space-4);
    }

    /* Toggle handle */
    .postbox .handlediv {
        height: auto;
        width: auto;
    }

    .postbox .toggle-indicator:before {
        color: var(--slate-400);
    }

    /* ==========================================================================
       DASHBOARD WIDGETS
       Override: dashboard.css
       ========================================================================== */

    #dashboard-widgets .postbox {
        border-radius: var(--radius-lg);
    }

    #dashboard-widgets .postbox .hndle {
        font-size: 14px;
        font-weight: 600;
    }

    #dashboard-widgets .postbox .inside {
        margin-bottom: 0;
    }

    /* Override: welcome panel (dashboard.css line 119-127) */
    .welcome-panel {
        position: relative;
        overflow: auto;
        margin: 16px 0;
        background: linear-gradient(135deg, var(--slate-800) 0%, var(--slate-900) 100%);
        font-size: 14px;
        line-height: 1.3;
        clear: both;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-lg);
    }

    .welcome-panel h2 {
        margin: 0;
        font-size: 48px;
        font-weight: 600;
        line-height: 1.25;
        color: #fff;
    }

    .welcome-panel h3 {
        margin: 0;
        font-size: 20px;
        font-weight: 400;
        line-height: 1.4;
        color: var(--slate-300);
    }

    .welcome-panel p {
        color: var(--slate-300);
    }

    .welcome-panel a {
        color: var(--primary);
    }

    .welcome-panel .welcome-panel-column-container {
        background: #fff;
        border-radius: 0 0 var(--radius-xl) var(--radius-xl);
    }

    /* Welcome panel icons */
    [class*="welcome-panel-icon"] {
        height: 60px;
        width: 60px;
        background-position: center;
        background-size: 24px 24px;
        background-repeat: no-repeat;
        border-radius: 100%;
    }

    .welcome-panel-icon-pages {
        background-color: var(--primary);
    }

    .welcome-panel-icon-layout {
        background-color: #8b5cf6; /* violet-500 */
    }

    .welcome-panel-icon-styles {
        background-color: #ec4899; /* pink-500 */
    }

    /* Welcome panel column text */
    .welcome-panel-column {
        display: grid;
        grid-template-columns: min-content 1fr;
        gap: 24px;
    }

    .welcome-panel-column h3 {
        color: var(--slate-900);
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 8px;
    }

    .welcome-panel-column p {
        color: var(--slate-600);
        font-size: 14px;
        line-height: 1.5;
    }

    /* Welcome panel close button */
    .welcome-panel .welcome-panel-close {
        color: var(--slate-300);
        text-decoration: none;
    }

    .welcome-panel .welcome-panel-close:hover,
    .welcome-panel .welcome-panel-close:focus {
        color: #fff;
    }

    .welcome-panel .welcome-panel-close:before {
        color: inherit;
    }

    /* Welcome panel header content */
    .welcome-panel-header {
        padding: 48px 0 80px 48px;
    }

    .welcome-panel-header p {
        color: var(--slate-300);
        font-size: 18px;
    }

    .welcome-panel-header a {
        color: var(--primary);
    }

    /* ==========================================================================
       TABS & NAVIGATION TABS
       ========================================================================== */

    .nav-tab-wrapper {
        border-bottom: 1px solid var(--slate-200);
        margin-bottom: var(--space-6);
        padding: 0;
    }

    .nav-tab {
        background: transparent;
        border: none;
        border-bottom: 2px solid transparent;
        color: var(--slate-500);
        font-size: 14px;
        font-weight: 500;
        margin: 0;
        margin-bottom: -1px;
        padding: var(--space-3) var(--space-4);
        transition: all var(--transition-fast);
        text-decoration: none;
    }

    .nav-tab:hover,
    .nav-tab:focus {
        background: transparent;
        border-bottom-color: var(--slate-300);
        color: var(--slate-700);
    }

    .nav-tab-active,
    .nav-tab-active:hover,
    .nav-tab-active:focus {
        background: transparent;
        border-bottom: 2px solid var(--primary);
        color: var(--primary);
    }

    /* ==========================================================================
       SEARCH BOX
       Override: forms.css line 747-755
       ========================================================================== */

    p.search-box {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        column-gap: 0.5rem;
        position: relative;
        float: right;
        margin: 11px 0;
    }

    .search-box input[type="search"],
    #post-search-input {
        min-width: 250px;
        padding: 0 8px;
        height: 32px;
    }

    .search-box .button {
        margin-left: var(--space-2);
    }

    /* ==========================================================================
       PUBLISHING BOX
       Override: common.css line 926-976
       ========================================================================== */

    #major-publishing-actions {
        padding: var(--space-3);
        clear: both;
        border-top: 1px solid var(--slate-200);
        background: var(--slate-50);
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    }

    #minor-publishing-actions {
        padding: 10px 10px 0;
        text-align: right;
    }

    .misc-pub-section {
        padding: 6px 10px 8px;
    }

    #delete-action {
        float: left;
        line-height: 2.30769231;
    }

    #publishing-action {
        text-align: right;
        float: right;
        line-height: 1.9;
    }

    /* ==========================================================================
       FILTER BAR / WP-FILTER
       Override: common.css line 1012-1024
       ========================================================================== */

    .wp-filter {
        display: inline-block;
        position: relative;
        box-sizing: border-box;
        margin: 12px 0 25px;
        padding: 0 10px;
        width: 100%;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--slate-200);
        border-radius: var(--radius-lg);
        background: #fff;
        color: var(--slate-600);
        font-size: 13px;
    }

    .wp-filter a {
        text-decoration: none;
    }

    /* Filter links */
    .filter-links li > a {
        display: inline-block;
        margin: 0 10px;
        padding: 15px 0;
        border-bottom: 3px solid transparent;
        color: var(--slate-600);
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .filter-links .current {
        box-shadow: none;
        border-bottom: 3px solid var(--primary);
        color: var(--slate-900);
    }

    .filter-links li > a:hover,
    .filter-links li > a:focus {
        color: var(--primary);
    }

    /* ==========================================================================
       PLUGIN & THEME CARDS
       ========================================================================== */

    .plugin-card,
    .theme-browser .theme {
        border: 1px solid var(--slate-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        transition: all var(--transition-fast);
    }

    .plugin-card:hover,
    .theme-browser .theme:hover {
        box-shadow: var(--shadow-md);
        border-color: var(--slate-300);
    }

    .plugin-card .plugin-card-top {
        padding: var(--space-4);
    }

    .plugin-card .name,
    .plugin-card .name h3 {
        font-size: 16px;
        font-weight: 600;
        color: var(--slate-800);
    }

    .plugin-card .desc {
        color: var(--slate-600);
        font-size: 13px;
    }

    /* ==========================================================================
       UPLOAD PLUGIN/THEME FORM
       Override: themes.css upload-plugin styles
       ========================================================================== */

    .upload-plugin,
    .upload-theme {
        box-sizing: border-box;
        margin: 0;
        padding: 50px 0;
        width: 100%;
        overflow: hidden;
        position: relative;
        top: 10px;
        text-align: center;
    }

    .upload-plugin .install-help,
    .upload-theme .install-help {
        color: var(--slate-600);
        font-size: 16px;
        font-style: normal;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    /* Upload form container */
    .upload-plugin .wp-upload-form,
    .upload-theme .wp-upload-form {
        background: #fff;
        border: 1px solid var(--slate-200);
        border-radius: var(--radius-lg);
        padding: 30px 40px;
        margin: 30px auto;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 16px;
        box-shadow: var(--shadow-sm);
    }

    /* File input styling */
    .upload-plugin .wp-upload-form input[type="file"],
    .upload-theme .wp-upload-form input[type="file"] {
        font-family: var(--font-sans);
        font-size: 14px;
        color: var(--slate-700);
    }

    /* File input button (::file-selector-button) */
    .wp-admin input[type="file"]::file-selector-button {
        background: #fff;
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md);
        padding: 8px 16px;
        font-family: var(--font-sans);
        font-size: 13px;
        font-weight: 500;
        color: var(--slate-700);
        cursor: pointer;
        margin-right: 12px;
        box-shadow: var(--shadow-xs);
        transition: all var(--transition-fast);
    }

    .wp-admin input[type="file"]::file-selector-button:hover {
        background: var(--slate-50);
        border-color: var(--slate-400);
        color: var(--slate-900);
    }

    /* Install Now / Submit button in upload form */
    .upload-plugin .wp-upload-form input[type="submit"],
    .upload-theme .wp-upload-form input[type="submit"],
    .wp-upload-form .button-primary {
        background: var(--primary);
        border: 1px solid var(--primary);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        color: #fff;
        font-family: var(--font-sans);
        font-size: 14px;
        font-weight: 500;
        padding: 8px 20px;
        height: auto;
        line-height: 1.5;
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .upload-plugin .wp-upload-form input[type="submit"]:hover,
    .upload-theme .wp-upload-form input[type="submit"]:hover,
    .wp-upload-form .button-primary:hover {
        background: var(--primary-hover);
        border-color: var(--primary-hover);
    }

    .upload-plugin .wp-upload-form input[type="submit"]:focus,
    .upload-theme .wp-upload-form input[type="submit"]:focus,
    .wp-upload-form .button-primary:focus {
        box-shadow: var(--shadow-focus);
        outline: 2px solid transparent;
    }


    /* ==========================================================================
       FORM TABLE
       ========================================================================== */

    .form-table th {
        font-weight: 500;
        color: var(--slate-700);
        padding: var(--space-4) var(--space-3) var(--space-4) 0;
        font-size: 13px;
    }

    .form-table td {
        padding: var(--space-4) var(--space-3);
    }

    .form-table td p.description {
        color: var(--slate-500);
        font-size: 12px;
        margin-top: var(--space-1);
    }

    /* ==========================================================================
       FOOTER
       Override: footer area
       ========================================================================== */

    #wpfooter {
        background: var(--slate-50);
        border-top: 1px solid var(--slate-200);
        padding: var(--space-4) var(--space-6);
        color: var(--slate-500);
        font-size: 12px;
    }

    #wpfooter a {
        color: var(--primary);
    }

    /* ==========================================================================
       SCREEN OPTIONS & HELP
       ========================================================================== */

    #screen-meta-links .show-settings {
        border-radius: 0 0 var(--radius-md) var(--radius-md);
        background: var(--slate-100);
        border: 1px solid var(--slate-200);
        border-top: none;
        font-size: 12px;
        color: var(--slate-600);
    }

    #screen-meta {
        background: var(--slate-100);
        border: 1px solid var(--slate-200);
        border-top: none;
    }

    /* ==========================================================================
       CLASSIC EDITOR SPECIFIC
       ========================================================================== */

    /* Title field - Override: edit.css line 59-68 */
    #titlediv #title {
        padding: var(--space-3) var(--space-4);
        font-size: 1.5em;
        line-height: 1.4;
        height: auto;
        width: 100%;
        outline: none;
        margin: 0 0 3px;
        background-color: #fff;
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-xs);
        transition: all var(--transition-fast);
    }

    #titlediv #title:focus {
        border-color: var(--primary);
        box-shadow: var(--shadow-focus);
    }

    #titlediv #title-prompt-text {
        color: var(--slate-400);
        position: absolute;
        font-size: 1.5em;
        padding: var(--space-3) var(--space-4);
        pointer-events: none;
    }

    /* Editor toolbar */
    #wp-content-editor-tools {
        background-color: var(--slate-100);
        padding-top: 20px;
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }

    /* Post status info */
    #post-status-info {
        width: 100%;
        border-spacing: 0;
        border: 1px solid var(--slate-200);
        border-top: none;
        background-color: var(--slate-50);
        box-shadow: var(--shadow-sm);
        z-index: 999;
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    }

    /* Side sortables width - Override: edit.css line 446-448 */
    #poststuff #post-body.columns-2 #side-sortables {
        width: 280px;
    }

    /* ==========================================================================
       ACCESSIBILITY
       ========================================================================== */

    .screen-reader-text,
    .screen-reader-shortcut {
        clip: rect(1px, 1px, 1px, 1px);
        position: absolute;
    }

    .screen-reader-shortcut:focus {
        clip: auto;
        background: var(--slate-900);
        color: #fff;
        border-radius: var(--radius-md);
        padding: var(--space-2) var(--space-4);
        z-index: 100000;
    }

    /* Generic link styles - Override: common.css line 258-283 */
    a {
        color: var(--primary);
        transition: color var(--transition-fast);
    }

    a:hover,
    a:active {
        color: var(--primary-hover);
    }

    a:focus {
        color: var(--primary-dark);
        box-shadow: var(--shadow-focus);
        outline: 2px solid transparent;
    }

    #adminmenu a:focus {
        box-shadow: none;
        outline: 1px solid transparent;
        outline-offset: -1px;
    }

    /* Code styling - Override: common.css line 414-428 */
    kbd,
    code {
        padding: 2px 6px;
        margin: 0 1px;
        background: var(--slate-100);
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-family: var(--font-mono);
    }

    /* ==========================================================================
       RESPONSIVE ADJUSTMENTS
       ========================================================================== */

    /* Auto-fold sidebar (admin-menu.css line 545-659) */
    @media only screen and (max-width: 960px) {
        .auto-fold #wpcontent,
        .auto-fold #wpfooter {
            margin-left: 36px;
        }

        .auto-fold #adminmenuback,
        .auto-fold #adminmenuwrap,
        .auto-fold #adminmenu,
        .auto-fold #adminmenu li.menu-top {
            width: 36px;
        }

        .auto-fold #adminmenu .wp-submenu.sub-open,
        .auto-fold #adminmenu .opensub .wp-submenu {
            top: 0;
            left: 36px;
        }
    }

    @media screen and (max-width: 782px) {
        .auto-fold #wpcontent {
            position: relative;
            margin-left: 0;
            padding-left: 10px;
        }

        .auto-fold #adminmenu,
        .auto-fold #adminmenuback,
        .auto-fold #adminmenuwrap {
            position: absolute;
            width: 190px;
            z-index: 100;
        }

        .auto-fold #adminmenu li.menu-top {
            width: 100%;
        }

        .auto-fold #adminmenu li a {
            font-size: 14px;
            padding: 5px;
        }
    }

    /* ==========================================================================
       IMPORTANT OVERRIDES (Last Resort)
       Some WordPress core styles are very aggressive
       ========================================================================== */

    .wp-core-ui select:focus,
    .wp-core-ui input[type="text"]:focus,
    .wp-core-ui input[type="email"]:focus,
    .wp-core-ui input[type="password"]:focus {
        border-color: var(--primary) !important;
        box-shadow: var(--shadow-focus) !important;
    }

    /* Fix input height consistency */
    .wp-admin input[type="text"],
    .wp-admin input[type="email"],
    .wp-admin input[type="password"],
    .wp-admin input[type="search"] {
        height: auto;
        min-height: 32px;
    }

    /* ==========================================================================
       TINYMCE CLASSIC EDITOR
       Override: wp-includes/css/editor.css
       ========================================================================== */

    /* TinyMCE container */
    .mce-tinymce {
        box-shadow: var(--shadow-sm);
        border-radius: var(--radius-lg);
        border: 1px solid var(--slate-200) !important;
        overflow: hidden;
    }

    /* TinyMCE panel */
    div.mce-panel {
        border: 0;
        background: #fff;
    }

    /* Toolbar group container */
    div.mce-toolbar-grp {
        border-bottom: 1px solid var(--slate-200);
        background: var(--slate-100);
        padding: 0;
        position: relative;
    }

    div.mce-toolbar-grp > div {
        padding: 6px 8px;
    }

    /* Individual toolbar row */
    .mce-container.mce-toolbar {
        background: transparent;
    }

    /* Button group */
    .mce-btn-group {
        border: none;
        background: transparent;
    }

    /* Icon styling */
    .mce-ico {
        color: var(--slate-600);
    }

    .mce-btn:hover .mce-ico,
    .mce-btn:focus .mce-ico {
        color: var(--slate-900);
    }

    .mce-btn.mce-active .mce-ico {
        color: var(--slate-900);
    }

    .mce-btn.mce-disabled .mce-ico {
        color: var(--slate-400);
    }

    /* Toolbar buttons */
    .mce-toolbar .mce-btn,
    .mce-widget.mce-btn,
    .qt-dfw {
        border-color: transparent;
        background: transparent;
        box-shadow: none;
        text-shadow: none;
        cursor: pointer;
    }

    .mce-toolbar .mce-btn-group .mce-btn,
    .mce-widget.mce-btn,
    .qt-dfw {
        border: 1px solid transparent;
        margin: 2px;
        border-radius: var(--radius-sm);
        padding: 4px 6px;
    }

    .mce-toolbar .mce-btn-group .mce-btn:hover,
    .mce-toolbar .mce-btn-group .mce-btn:focus,
    .mce-widget.mce-btn:hover,
    .mce-widget.mce-btn:focus,
    .qt-dfw:hover,
    .qt-dfw:focus {
        background: #fff;
        color: var(--slate-900);
        box-shadow: var(--shadow-xs);
        border-color: var(--slate-300);
    }

    .mce-toolbar .mce-btn-group .mce-btn.mce-active,
    .mce-toolbar .mce-btn-group .mce-btn:active,
    .mce-widget.mce-btn.mce-active,
    .qt-dfw.active {
        background: #fff;
        border-color: var(--primary);
        box-shadow: 0 0 0 1px var(--primary);
    }

    .mce-toolbar .mce-btn-group .mce-btn.mce-active .mce-ico {
        color: var(--primary);
    }

    .mce-toolbar .mce-btn-group .mce-btn.mce-active:hover,
    .mce-toolbar .mce-btn-group .mce-btn.mce-active:focus {
        border-color: var(--primary);
        background: var(--primary-light);
    }

    .mce-toolbar .mce-btn-group .mce-btn.mce-disabled,
    .mce-widget.mce-btn.mce-disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Primary button in toolbar */
    .mce-toolbar .mce-btn-group .mce-btn.mce-primary {
        min-width: 0;
        background: var(--primary);
        border-color: var(--primary);
        box-shadow: none;
        color: #fff;
        text-decoration: none;
        text-shadow: none;
        border-radius: var(--radius-sm);
    }

    .mce-toolbar .mce-btn-group .mce-btn.mce-primary:hover,
    .mce-toolbar .mce-btn-group .mce-btn.mce-primary:focus {
        background: var(--primary-hover);
        border-color: var(--primary-hover);
        color: #fff;
    }

    /* Listbox (Paragraf dropdown) in toolbar */
    .mce-toolbar .mce-btn-group .mce-btn.mce-listbox,
    .mce-widget.mce-btn.mce-listbox,
    .mce-menubtn.mce-listbox {
        border-radius: var(--radius-md);
        direction: ltr;
        background: #fff;
        border: 1px solid var(--slate-300);
        padding: 4px 8px;
        min-width: 100px;
    }

    .mce-toolbar .mce-btn.mce-listbox .mce-txt {
        font-size: 13px;
        color: var(--slate-700);
        font-weight: 500;
    }

    .mce-toolbar .mce-btn.mce-listbox .mce-caret {
        border-top-color: var(--slate-500);
        margin-left: 4px;
    }

    .mce-toolbar .mce-btn-group .mce-btn.mce-listbox:hover,
    .mce-toolbar .mce-btn-group .mce-btn.mce-listbox:focus {
        border-color: var(--slate-400);
        box-shadow: none;
    }

    /* TinyMCE status bar */
    div.mce-statusbar {
        border-top: 1px solid var(--slate-200);
        background: var(--slate-50);
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    }

    div.mce-path {
        padding: 4px 12px;
        margin: 0;
    }

    .mce-path,
    .mce-path-item,
    .mce-path .mce-divider {
        font-size: 12px;
        color: var(--slate-500);
    }

    .mce-path-item:hover,
    .mce-path-item:focus {
        color: var(--primary);
    }

    /* TinyMCE menus */
    .mce-menu,
    .mce-floatpanel.mce-popover {
        border: 1px solid var(--slate-200);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-lg);
    }

    .mce-menu-item {
        border: none;
        margin-bottom: 2px;
        padding: 6px 15px 6px 12px;
        border-radius: var(--radius-sm);
    }

    .mce-menu .mce-menu-item:hover,
    .mce-menu .mce-menu-item.mce-selected,
    .mce-menu .mce-menu-item:focus {
        background: var(--primary);
        color: #fff;
    }

    /* TinyMCE modal windows */
    .mce-window {
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--slate-200);
    }

    .mce-window .mce-window-head {
        background: #fff;
        border-bottom: 1px solid var(--slate-200);
        padding: 0;
        min-height: 48px;
        border-radius: var(--radius-xl) var(--radius-xl) 0 0;
    }

    .mce-window .mce-window-head .mce-title {
        color: var(--slate-900);
        font-size: 16px;
        font-weight: 600;
        line-height: 48px;
        margin: 0;
        padding: 0 48px 0 16px;
    }

    .mce-window .mce-foot {
        border-top: 1px solid var(--slate-200);
        background: var(--slate-50);
        border-radius: 0 0 var(--radius-xl) var(--radius-xl);
    }

    /* Buttons in modals */
    .mce-window .mce-btn {
        color: var(--slate-700);
        background: #fff;
        font-size: 13px;
        line-height: 30px;
        height: 32px;
        padding: 0 12px;
        cursor: pointer;
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-xs);
    }

    .mce-window .mce-btn:hover,
    .mce-window .mce-btn:focus {
        background: var(--slate-50);
        border-color: var(--slate-400);
        color: var(--slate-900);
    }

    .mce-window .mce-btn.mce-primary {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
        box-shadow: var(--shadow-sm);
    }

    .mce-window .mce-btn.mce-primary:hover,
    .mce-window .mce-btn.mce-primary:focus {
        background: var(--primary-hover);
        border-color: var(--primary-hover);
        color: #fff;
    }

    /* TinyMCE textboxes */
    .mce-textbox {
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-xs);
        padding: 6px 8px;
    }

    .mce-textbox:focus,
    .mce-textbox.mce-focus {
        border-color: var(--primary);
        box-shadow: var(--shadow-focus);
    }

    /* Quicktags bar */
    #wp-content-editor-tools {
        background-color: var(--slate-100);
        padding-top: 12px;
        border: 1px solid var(--slate-200);
        border-bottom: none;
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }

    .wp-editor-tabs {
        float: right;
        padding: 0 8px;
    }

    .wp-switch-editor {
        background: #fff;
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-md) var(--radius-md) 0 0;
        color: var(--slate-600);
        font-size: 13px;
        font-weight: 500;
        padding: 6px 12px;
        margin: 0 0 0 4px;
    }

    .wp-switch-editor:hover {
        background: var(--slate-50);
        color: var(--slate-900);
    }

    .html-active .switch-html,
    .tmce-active .switch-tmce {
        background: #fff;
        border-bottom-color: #fff;
        color: var(--slate-900);
    }

    /* Quicktags buttons */
    .quicktags-toolbar {
        background: var(--slate-50);
        border-bottom: 1px solid var(--slate-200);
        padding: 4px;
    }

    .quicktags-toolbar input.ed_button {
        background: #fff;
        border: 1px solid var(--slate-300);
        border-radius: var(--radius-sm);
        color: var(--slate-700);
        font-size: 12px;
        padding: 4px 8px;
        margin: 2px;
    }

    .quicktags-toolbar input.ed_button:hover {
        background: var(--slate-50);
        border-color: var(--slate-400);
        color: var(--slate-900);
    }

    /* ==========================================================================
       DASHICONS & TABLE SORTING ICONS
       ========================================================================== */

    /* Sorting indicators in table headers */
    .sorting-indicator:before {
        font: normal 20px/1 dashicons;
        color: var(--slate-400);
    }

    th.sorted.desc .sorting-indicator.desc:before,
    th.sorted.asc .sorting-indicator.asc:before {
        color: var(--slate-700);
    }

    th.sorted.asc a:focus .sorting-indicator.asc:before,
    th.sorted.asc:hover .sorting-indicator.asc:before,
    th.sorted.desc a:focus .sorting-indicator.desc:before,
    th.sorted.desc:hover .sorting-indicator.desc:before {
        color: var(--slate-400);
    }

    th.sorted.asc a:focus .sorting-indicator.desc:before,
    th.sorted.asc:hover .sorting-indicator.desc:before,
    th.sorted.desc a:focus .sorting-indicator.asc:before,
    th.sorted.desc:hover .sorting-indicator.asc:before {
        color: var(--slate-700);
    }

    /* Comment bubble icon */
    th .comment-grey-bubble:before {
        color: var(--slate-500);
    }

    /* Admin menu dashicons */
    .dashicons,
    .dashicons-before:before {
        color: inherit;
    }

    /* Button icons */
    .button .dashicons,
    .button-secondary .dashicons,
    .button-link .dashicons {
        vertical-align: middle;
        margin-top: -2px;
    }

    /* Screen options icons */
    #screen-meta-links .show-settings:before {
        color: var(--slate-500);
    }

    #screen-meta-links .show-settings:hover:before,
    #screen-meta-links .show-settings:focus:before {
        color: var(--slate-700);
    }

    /* Toggle row button */
    .wp-list-table .toggle-row:before {
        color: var(--slate-500);
    }

    .wp-list-table .toggle-row:hover:before,
    .wp-list-table .toggle-row:focus:before {
        color: var(--slate-700);
    }

    /* Publish box icons */
    #post-body .misc-pub-post-status:before,
    #post-body #visibility:before,
    .curtime #timestamp:before,
    #post-body .misc-pub-uploadedby:before,
    #post-body .misc-pub-uploadedto:before,
    #post-body .misc-pub-revisions:before,
    #post-body .misc-pub-response-to:before,
    #post-body .misc-pub-comment-status:before {
        color: var(--slate-400);
    }

    /* Caret icons in dropdowns */
    .mce-panel .mce-btn i.mce-caret {
        border-top-color: var(--slate-500);
    }

    .mce-panel .mce-btn:hover i.mce-caret,
    .mce-panel .mce-btn:focus i.mce-caret {
        border-top-color: var(--slate-700);
    }

    ';

    // Add inline style with high priority
    wp_add_inline_style('wp-admin', $css);
}
add_action('admin_enqueue_scripts', 'modern_admin_ui_enqueue_styles', 9999);

/**
 * Load Google Font (Inter) for better typography
 */
function modern_admin_ui_load_fonts() {
    if (!is_admin()) {
        return;
    }
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">';
}
add_action('admin_head', 'modern_admin_ui_load_fonts', 1);

/**
 * Add admin body class for potential JS hooks
 */
function modern_admin_ui_body_class($classes) {
    return $classes . ' modern-admin-ui';
}
add_filter('admin_body_class', 'modern_admin_ui_body_class');

/**
 * Customize admin footer text
 */
function modern_admin_ui_footer_text() {
    return '<span style="color: var(--slate-600);">Teknoza - Digitalcake - Emirhan Kızıloğlu</span>';
}
add_filter('admin_footer_text', 'modern_admin_ui_footer_text');

/**
 * Remove WordPress version from footer
 */
function modern_admin_ui_footer_version() {
    return '';
}
add_filter('update_footer', 'modern_admin_ui_footer_version', 9999);

/**
 * Remove WordPress logo from admin bar
 */
function modern_admin_ui_remove_wp_logo($wp_admin_bar) {
    $wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'modern_admin_ui_remove_wp_logo', 999);

/**
 * Add custom logo area to admin sidebar (at the TOP of the menu)
 * Uses JavaScript to prepend the logo container before the menu
 */
function modern_admin_ui_sidebar_logo() {
    // Get custom admin logo from theme mod or use site logo
    $admin_logo_url = get_option('modern_admin_logo_url', '');
    
    if (empty($admin_logo_url)) {
        // Fallback to site custom logo
        $custom_logo_id = get_theme_mod('custom_logo');
        if ($custom_logo_id) {
            $admin_logo_url = wp_get_attachment_image_url($custom_logo_id, 'medium');
        }
    }
    
    $site_name = esc_attr(get_bloginfo('name'));
    $home_url = esc_url(home_url('/'));
    
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var adminMenuWrap = document.getElementById('adminmenuwrap');
        if (adminMenuWrap) {
            var logoContainer = document.createElement('div');
            logoContainer.className = 'admin-logo-container';
            logoContainer.innerHTML = '<a href="<?php echo $home_url; ?>" target="_blank" style="text-decoration: none;">' +
                <?php if ($admin_logo_url): ?>
                '<img src="<?php echo esc_url($admin_logo_url); ?>" alt="<?php echo $site_name; ?>">' +
                <?php else: ?>
                '<span class="logo-text"><?php echo esc_js(get_bloginfo('name')); ?></span>' +
                <?php endif; ?>
                '</a>';
            adminMenuWrap.insertBefore(logoContainer, adminMenuWrap.firstChild);
        }
    });
    </script>
    <?php
}
add_action('admin_head', 'modern_admin_ui_sidebar_logo', 100);

/**
 * Add admin logo setting to Settings > General
 */
function modern_admin_ui_logo_settings() {
    add_settings_section(
        'modern_admin_ui_section',
        'Admin Panel Logosu',
        function() {
            echo '<p>Admin paneli sol sidebar\'ında görünecek logo URL\'sini girin.</p>';
        },
        'general'
    );
    
    add_settings_field(
        'modern_admin_logo_url',
        'Admin Logo URL',
        function() {
            $value = get_option('modern_admin_logo_url', '');
            echo '<input type="text" name="modern_admin_logo_url" value="' . esc_attr($value) . '" class="regular-text" placeholder="https://example.com/logo.svg">';
            echo '<p class="description">Logo görselinin tam URL\'sini girin (PNG, JPG, SVG desteklenir). Boş bırakılırsa site logosu kullanılır.</p>';
        },
        'general',
        'modern_admin_ui_section'
    );
    
    register_setting('general', 'modern_admin_logo_url', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ));
}
add_action('admin_init', 'modern_admin_ui_logo_settings');
