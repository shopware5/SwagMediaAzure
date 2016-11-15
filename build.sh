#!/bin/bash

lastTag=$(git tag | tail -n 1)
customTag=$1

if [ "$customTag" != "" ]; then lastTag=$customTag; fi
if [ "$lastTag" = "" ]; then lastTag="master"; fi

rm -f SwagMediaAzure-${lastTag}.zip
rm -rf SwagMediaAzure
mkdir -p SwagMediaAzure
git archive $lastTag | tar -x -C SwagMediaAzure

cd SwagMediaAzure
composer install --no-dev -n -o
cd ../
zip -r SwagMediaAzure-${lastTag}.zip SwagMediaAzure
rm -r SwagMediaAzure
