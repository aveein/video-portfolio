<?php $links = ['work' => 'Work', 'shorts' => 'Shorts', 'skills' => 'Skills', 'contact' => 'Contact']; ?>
<header class="fixed top-0 inset-x-0 z-50 backdrop-blur-xl bg-ink/60 border-b border-white/5">
  <nav class="mx-auto max-w-7xl flex items-center justify-between px-5 h-16">
    <a href="#top" class="font-display font-bold text-lg tracking-tight"><?= htmlspecialchars($site['name']) ?><span class="text-hot">.</span></a>
    <ul class="hidden md:flex gap-8 text-sm">
      <?php foreach ($links as $id => $label): ?>
        <li><a href="#<?= $id ?>" class="nav-link text-zinc-400 hover:text-white transition"><?= $label ?></a></li>
      <?php endforeach; ?>
    </ul>
    <a href="#contact" class="hidden md:inline-block rounded-full bg-white text-black text-sm font-medium px-4 py-2 hover:scale-105 transition">Hire me</a>
    <button id="menu-btn" class="md:hidden p-2" aria-label="Menu"><span class="block w-6 h-0.5 bg-white mb-1.5"></span><span class="block w-6 h-0.5 bg-white"></span></button>
  </nav>
  <ul id="mobile-menu" class="md:hidden hidden px-5 pb-4 space-y-3 text-sm">
    <?php foreach ($links as $id => $label): ?><li><a href="#<?= $id ?>"><?= $label ?></a></li><?php endforeach; ?>
  </ul>
</header>
