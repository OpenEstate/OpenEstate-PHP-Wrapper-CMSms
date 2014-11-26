#!/bin/bash

NAME="OpenEstatePhpWrapper"
VERSION="0.6-SNAPSHOT"
PROJECT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

rm -Rf $PROJECT_DIR/release
mkdir $PROJECT_DIR/release

cp -R $PROJECT_DIR/src $PROJECT_DIR/release/$NAME
cd $PROJECT_DIR/release
zip -r $NAME-$VERSION.zip $NAME
