#!/bin/sh

#cd $WWW
#npm --save-dev install aos jquery.stellar vue-carousel

WWW=/var/www/linkre.rafflesargentina.com
MODULE=${WWW}/app/Modules/Linkre

mkdir -p ${WWW}/public/images
cp -pr ${MODULE}/Resources/Images/ ${WWW}/public/images/
cp -pr ${MODULE}/Resources/Images/uploads ${WWW}/storage/app
