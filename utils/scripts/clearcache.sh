#!/usr/bin/env bash
SCRIPT_DIR=$(pwd)
SYMFONY_ROOT=${SCRIPT_DIR}/../..
SUDO=""
if [[ $(whoami) != 'root' ]]
then
	SUDO="sudo"
fi


cd $SYMFONY_ROOT
$SUDO php app/console cache:clear -e dev 2>&1
$SUDO php app/console cache:clear -e prod 2>&1
$SUDO chown -R www-data:www-data app/cache app/logs 2>&1

cd $SCRIPT_DIR

