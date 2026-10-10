#!/bin/bash
# Usage: tools/compress.sh /path/to/ffmpeg   (3 encodes in parallel)
export FF="${1:-ffmpeg}"
cd "$(dirname "$0")/../assets"
enc() {
  dir=$1; n=$2; f=$3
  [ "$dir" = shorts ] && S="scale='min(720,iw)':-2" || S="scale='min(1280,iw)':-2"
  out="videos/web/$dir/$dir-$n.mp4"
  "$FF" -y -loglevel error -i "$f" -vf "$S" -c:v libx264 -crf 28 -preset veryfast -threads 2 -pix_fmt yuv420p \
    -c:a aac -b:a 96k -movflags +faststart -f mp4 "$out.tmp" </dev/null && mv "$out.tmp" "$out" && echo "done $out"
}
export -f enc
for dir in shorts trailers lfv; do n=0; for f in videos/$dir/*.mp4; do n=$((n+1)); printf '%s\0%s\0%s\0' "$dir" "$n" "$f"; done; done \
 | xargs -0 -n3 -P3 bash -c 'enc "$@"' _
echo DONE
