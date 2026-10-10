<?php /** @var array $video */
$vertical = $video['orient'] === 'v'; ?>
<button type="button" data-video="<?= htmlspecialchars($video['video']) ?>" data-title="<?= htmlspecialchars($video['title']) ?>" data-orient="<?= $video['orient'] ?>"
  class="video-card reveal group relative block text-left rounded-2xl overflow-hidden bg-zinc-900 border border-white/5 <?= $vertical ? 'w-56 shrink-0 snap-start aspect-[9/16]' : 'w-full aspect-video' ?>">
  <video class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-105" muted loop playsinline preload="none" poster="<?= htmlspecialchars($video['poster']) ?>" data-src="<?= htmlspecialchars($video['video']) ?>"></video>
  <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/10 to-transparent"></div>
  <span class="play-ico absolute top-4 right-4 grid place-items-center w-10 h-10 rounded-full bg-white/15 backdrop-blur group-hover:bg-hot transition">▶</span>
  <h3 class="absolute bottom-0 inset-x-0 p-4 font-display font-medium leading-snug <?= $vertical ? 'text-sm' : 'text-lg' ?>"><?= htmlspecialchars($video['title']) ?></h3>
</button>
