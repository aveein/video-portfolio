<?php $site = $site ?? require __DIR__ . '/../data/site.php'; ?>
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($pageTitle ?? $site['name'] . ' — ' . $site['role']) ?></title>
<meta name="description" content="<?= htmlspecialchars($site['tagline']) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com/3.4.17"></script>
<script>
tailwind.config = { theme: { extend: {
  fontFamily: { display: ['"Space Grotesk"', 'sans-serif'], sans: ['Inter', 'sans-serif'] },
  colors: { ink: '#07070b', glow: '#8b5cf6', hot: '#ec4899' }
}}};
</script>
<link rel="stylesheet" href="assets/css/app.css">
</head>
<body class="bg-ink text-zinc-200 font-sans antialiased overflow-x-hidden">
<div id="progress" class="fixed top-0 left-0 h-0.5 w-0 z-[60] bg-gradient-to-r from-glow to-hot"></div>
<div id="cursor-glow" aria-hidden="true"></div>
