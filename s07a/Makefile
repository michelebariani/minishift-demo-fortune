#
# jinja2-based makefile to yield proper manifest files for each profile/stage.
#
# Manifest templates are expected to be found as app-*/*.j2
#
# HPA objects are expected to be named exactly as the basename of their
# templates objects, so e.g. object hpa/fortune-hpa is to be defined in
# template app-*/fortune-hpa.*.j2
# This allows to automatically probe the current (live) number of replicas and
# preserve it upon redeployment.
#

PROFILES_J2_FILE := profiles.yaml.j2
PROFILES_FILE := $(patsubst %.j2,%,$(PROFILES_J2_FILE))
LAST_PROFILE_FILE := .lastprofile
LAST_PROFILE := $(shell if [ -e $(LAST_PROFILE_FILE) ]; then cat $(LAST_PROFILE_FILE); fi )

J2_FILES := $(wildcard app-*/*.j2)
J2_TARGET_FILES := $(patsubst %.j2,%,$(J2_FILES))

HPA_FILES := $(wildcard app-*/*-hpa.*.j2)
HPA_OBJECTS := $(basename $(basename $(notdir $(HPA_FILES))))
HPA_VARS := $(shell \
	for hpa_object in $(HPA_OBJECTS); do \
		N=`oc get -o jsonpath="{$$.status.currentReplicas}" hpa/$$hpa_object`; \
		if [ ! -z $${N\#0} ]; then \
			KEY=`echo "CURRENT-$$hpa_object" | tr '[:lower:]' '[:upper:]'| tr '-' '_'` \
			R+=" -D $$KEY=$$N" ; \
		fi ; \
	done ; \
	echo $$R \
)

CLEAN_ALL_TARGETS_CMD := rm -f $(PROFILES_FILE) $(J2_TARGET_FILES)

.PHONY: local test live conditional_clean clean $(PROFILES_FILE)

local: PROFILE := local

test: PROFILE := test

live: PROFILE := live

local test live: conditional_clean $(J2_TARGET_FILES)
	@echo "$(PROFILE)" > $(LAST_PROFILE_FILE)

conditional_clean:
	@if [ "$(PROFILE)" != "$(LAST_PROFILE)" ]; then\
	   echo $(CLEAN_ALL_TARGETS_CMD); $(CLEAN_ALL_TARGETS_CMD);\
	fi


clean:
	rm -f $(LAST_PROFILE_FILE)
	$(CLEAN_ALL_TARGETS_CMD)


define jinja2_by_keyvalues_cmd
	jinja2 $(HPA_VARS) $@.j2 > $@
endef

define jinja2_by_profile_cmd
	jinja2 --strict -s $(PROFILE) $@.j2 $(PROFILES_FILE) > $@
endef

$(PROFILES_FILE): $(PROFILES_J2_FILE)
	$(call jinja2_by_keyvalues_cmd)

%.yaml: $(PROFILES_FILE) %.yaml.j2
	$(call jinja2_by_profile_cmd)

%.yml: $(PROFILES_FILE) %.yml.j2
	$(call jinja2_by_profile_cmd)
