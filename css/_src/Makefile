BOOTSTRAP_DIR = ../bootstrap
PUBLIC_DIR = ../public
LESSC ?= `which lessc`

#
# BUILD SIMPLE BOOTSTRAP DIRECTORY
# recess & uglifyjs are required
#

css:
	${LESSC} --yui-compress \
		bootstrap.less > ../min/agendav.min.css

watch:
	 echo "Watching less files..."; \
	 watchr -d -e "watch('.*\.less') { system 'make' }"

.PHONY: watch
