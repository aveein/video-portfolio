<?php
$site   = require __DIR__ . '/data/site.php';
$videos = require __DIR__ . '/data/videos.php';
include 'partials/head.php';
include 'partials/header.php';
?>
<main id="top">
  <!-- Hero -->
  <section class="relative min-h-screen grid place-items-center overflow-hidden px-5">
    <div class="blob b1"></div><div class="blob b2"></div><div class="grid-bg"></div>
    <div class="relative text-center max-w-4xl pt-20">
      <p class="hero-in text-xs uppercase tracking-[0.4em] text-zinc-400 mb-6" style="--d:0s"><?= htmlspecialchars($site['role']) ?></p>
      <h1 class="font-display font-bold text-6xl md:text-8xl leading-[0.95] tracking-tight">
        <span class="hero-in block" style="--d:.15s">Video Editing</span>
        <span class="hero-in block text-gradient" style="--d:.3s">Portfolio</span>
      </h1>
      <p class="hero-in mt-8 text-lg md:text-xl text-zinc-400" style="--d:.5s"><?= htmlspecialchars($site['tagline']) ?></p>
      <div class="hero-in mt-10 flex gap-4 justify-center flex-wrap" style="--d:.7s">
        <a href="#work" class="rounded-full bg-gradient-to-r from-glow to-hot px-7 py-3 font-medium hover:scale-105 transition">See my work</a>
        <a href="#contact" class="rounded-full border border-white/20 px-7 py-3 hover:bg-white/10 transition">Get in touch</a>
      </div>
    </div>
    <div class="absolute bottom-0 inset-x-0 border-y border-white/5 bg-black/30 py-3 overflow-hidden">
      <div class="marquee font-display text-2xl text-zinc-600 whitespace-nowrap">
        <?php for ($i = 0; $i < 2; $i++): ?><span>Premiere Pro ✦ After Effects ✦ Photoshop ✦ Podcasts ✦ Trailers ✦ Shorts ✦ Long-form ✦ Motion ✦ </span><?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- Work -->
  <section id="work" class="mx-auto max-w-7xl px-5 py-28">
    <?php $eyebrow = 'Trailers'; $heading = 'Podcast Trailers'; $sub = 'Hooks that sell the show in under a minute.'; include 'partials/section-heading.php'; ?>
    <div class="grid md:grid-cols-2 gap-6">
      <?php foreach ($videos['trailers'] as $video) include 'partials/video-card.php'; ?>
    </div>

    <div class="mt-28">
    <?php $eyebrow = 'Long-form'; $heading = 'Full Episodes'; $sub = 'Interviews and conversations, edited for retention.'; include 'partials/section-heading.php'; ?>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($videos['lfv'] as $video) include 'partials/video-card.php'; ?>
    </div>
    </div>
  </section>

  <!-- Shorts -->
  <section id="shorts" class="py-28 bg-white/[0.02]">
    <div class="mx-auto max-w-7xl px-5">
      <?php $eyebrow = 'Short-form'; $heading = 'Reels & Shorts'; $sub = 'Vertical, fast, captioned. Scroll sideways.'; include 'partials/section-heading.php'; ?>
      <div class="rail flex gap-5 overflow-x-auto snap-x pb-6">
        <?php foreach ($videos['shorts'] as $video) include 'partials/video-card.php'; ?>
      </div>
    </div>
  </section>

  <!-- Skills -->
  <section id="skills" class="mx-auto max-w-7xl px-5 py-28">
    <?php $eyebrow = 'Toolkit'; $heading = 'Skills'; $sub = $site['about']; include 'partials/section-heading.php'; ?>
    <div class="grid md:grid-cols-3 gap-6">
      <?php foreach ($site['skills'] as $s): ?>
      <div class="reveal skill-card rounded-2xl border border-white/10 bg-zinc-900/60 p-7">
        <div class="grid place-items-center w-16 h-16 rounded-xl font-display font-bold text-2xl border-2" style="color:<?= $s['color'] ?>;border-color:<?= $s['color'] ?>;background:<?= $s['color'] ?>15"><?= $s['short'] ?></div>
        <h3 class="mt-5 font-display text-xl font-medium"><?= htmlspecialchars($s['name']) ?></h3>
        <p class="mt-2 text-sm text-zinc-400"><?= htmlspecialchars($s['desc']) ?></p>
        <div class="mt-5 h-1.5 rounded-full bg-white/10 overflow-hidden"><div class="bar h-full rounded-full" data-w="<?= $s['level'] ?>" style="background:<?= $s['color'] ?>"></div></div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="mx-auto max-w-4xl px-5 py-28 text-center">
    <div class="reveal">
      <p class="text-xs uppercase tracking-[0.3em] text-hot mb-4">Contact</p>
      <h2 class="font-display text-5xl md:text-7xl font-bold tracking-tight">Let's make<br><span class="text-gradient">something great.</span></h2>
      <?php if ($site['email']): ?><a href="mailto:<?= $site['email'] ?>" class="mt-10 inline-block rounded-full bg-white text-black font-medium px-8 py-4 hover:scale-105 transition"><?= $site['email'] ?></a><?php endif; ?>
      <?php if ($site['socials']): ?><div class="mt-8 flex gap-6 justify-center text-zinc-400">
        <?php foreach ($site['socials'] as $n => $u): ?><a class="hover:text-white" href="<?= htmlspecialchars($u) ?>"><?= htmlspecialchars($n) ?></a><?php endforeach; ?>
      </div><?php endif; ?>
    </div>
  </section>
</main>
<?php include 'partials/footer.php'; ?>
