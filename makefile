SHELL := /bin/bash

release:
	@set -e; \
	latest_tag=$$(git tag --list 'v*.*.*' --sort=-v:refname | head -n1); \
	echo "Dernier tag: $$latest_tag"; \
	if [ -z "$$latest_tag" ]; then \
		new_tag="v1.1.1"; \
	else \
		version=$$(echo $$latest_tag | sed 's/^v//'); \
		IFS='.' read -r major minor patch <<< "$$version"; \
		patch=$$((patch + 1)); \
		new_tag="v$$major.$$minor.$$patch"; \
	fi; \
	echo "Nouveau tag: $$new_tag"; \
	git add .; \
	git commit -m "release $$new_tag" || echo "Aucun changement à commit"; \
	git push; \
	git tag $$new_tag; \
	git push origin $$new_tag
