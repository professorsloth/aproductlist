#!/bin/sh
phpunit
while inotifywait --exclude ".*\.swp|.*.swx" -r -q -e modify -e create -e delete ./; do
	echo ""
	echo "=========================================="
	echo "------------------------------------------"
	echo ""
	echo ""
	echo ""
	echo ""
	echo ""
	phpunit
done
