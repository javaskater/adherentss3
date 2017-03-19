# cleanup last version
rm -rf prod
mkdir prod

# build
sh scripts/build.sh

# minify js
uglify -s bundle.js -o prod/bundle.js
# minify css
cssshrink bundle.css > prod/bundle.css
# copy html and images
cp index.html prod/index.html
cp -r images/ prod/images/

# done
date; echo;

