<footer class="border-t border-white/5 py-8 text-center text-sm text-zinc-500">
  © <?= date('Y') ?> <?= htmlspecialchars($site['name']) ?> — <?= htmlspecialchars($site['role']) ?>
</footer>
<div id="lightbox" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/90 backdrop-blur p-4">
  <button id="lb-close" class="absolute top-5 right-6 text-3xl" aria-label="Close">×</button>
  <div class="w-full max-w-5xl">
    <video id="lb-video" controls playsinline class="mx-auto max-h-[80vh] w-auto max-w-full rounded-xl"></video>
    <p id="lb-title" class="mt-4 text-center font-display text-lg"></p>
  </div>
</div>
<script src="assets/js/app.js"></script>
</body>
</html>
