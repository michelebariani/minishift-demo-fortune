#
# jinja2-based makefile to yield proper manifest files for each profile/stage.
# Manifest templates are expected to be found as app-*/*.j2
# 

PROFILES_FILE := profiles.yaml
J2_FILES := $(wildcard app-*/*.j2)

LAST_PROFILE_FILE := .lastprofile
LAST_PROFILE := $(shell if [ -e $(LAST_PROFILE_FILE) ]; then cat $(LAST_PROFILE_FILE); fi )

J2_TARGET_FILES := $(patsubst %.j2,%,$(J2_FILES))
J2_CLEAN_CMD := rm -f $(J2_TARGET_FILES)


.PHONY: local test live conditional_clean clean

local: PROFILE := local

test: PROFILE := test

live: PROFILE := live

local test live: conditional_clean $(J2_TARGET_FILES)
	@echo "$(PROFILE)" > $(LAST_PROFILE_FILE)


conditional_clean:
	@if [ "$(PROFILE)" != "$(LAST_PROFILE)" ]; then\
	   echo $(J2_CLEAN_CMD); $(J2_CLEAN_CMD);\
	fi


clean:
	rm -f $(LAST_PROFILE_FILE)
	$(J2_CLEAN_CMD)


define jinja2_cmd
	jinja2 --strict -s $(PROFILE) $@.j2 $(PROFILES_FILE) > $@
endef

%.yaml: $(PROFILES_FILE) %.yaml.j2
	$(call jinja2_cmd)

%.yml: $(PROFILES_FILE) %.yml.j2
	$(call jinja2_cmd)
