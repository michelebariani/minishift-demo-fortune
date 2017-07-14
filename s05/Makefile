#
# jinja2-based makefile to yield proper manifest files for each profile/stage.
# Manifest templates are expected to be found as app-*/*.j2
# 

PROFILES_FILE = profiles.yaml
J2_FILES = $(wildcard app-*/*.j2)

J2_TARGET_FILES = $(patsubst %.j2,%,$(J2_FILES))

.PHONY: local test live clean

local: PROFILE = local

test: PROFILE = test

live: PROFILE = live

local test live: clean $(J2_TARGET_FILES)

clean:
	rm -f $(J2_TARGET_FILES)

define jinja2_cmd
	jinja2 --strict -s $(PROFILE) $@.j2 $(PROFILES_FILE) > $@
endef

%.yaml: %.yaml.j2
	$(call jinja2_cmd)

%.yml: %.yml.j2
	$(call jinja2_cmd)
