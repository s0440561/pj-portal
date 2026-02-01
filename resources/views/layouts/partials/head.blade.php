<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<title>PJ-Portal @yield('title')</title>

<link href="https://fonts.googleapis.com" rel="preconnect" />
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;700;900&display=swap"
    rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;700&display=swap"
    rel="stylesheet" />

<link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
<link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#137fec",
                    "primary-dark": "#01579b",
                    "background-light": "#f5f7f8",
                    "background-dark": "#0f1a23",
                    "gradient-start": "#e1f5fe",
                    "gradient-end": "#ffffff",
                    "sidebar-start": "#137fec",
                    "sidebar-end": "#01579b",
                    "icon-bg": "#e1f5fe",
                    "icon-fg": "#137fec"
                },
                fontFamily: {
                    "display": ["Public Sans", "Noto Sans Thai", "sans-serif"],
                    "body": ["Public Sans", "Noto Sans Thai", "sans-serif"]
                },
                borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
            },
        },
    }
</script>
<style>
    body {
        font-family: 'Public Sans', 'Noto Sans Thai', sans-serif;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    .material-symbols-rounded {
        font-family: 'Material Symbols Rounded';
        font-weight: normal;
        font-style: normal;
        display: inline-block;
        line-height: 1;
        text-transform: none;
        letter-spacing: normal;
        word-wrap: normal;
        white-space: nowrap;
        direction: ltr;
        -webkit-font-smoothing: antialiased;
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    .material-symbols-outlined,
    .material-icons-outlined,
    .material-icons {
        font-family: 'Material Symbols Outlined';
        font-weight: normal;
        font-style: normal;
        display: inline-block;
        line-height: 1;
        text-transform: none;
        letter-spacing: normal;
        word-wrap: normal;
        white-space: nowrap;
        direction: ltr;
        -webkit-font-smoothing: antialiased;
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
</style>
@stack('styles')