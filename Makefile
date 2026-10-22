# メンテナンスモードのデモ操作。Windows など make が無い環境では、各行のコマンドを直接実行してください。
# WEB は nginx か apache
WEB ?= nginx

.PHONY: help up down app-down app-up web-down web-up flag-on flag-off status ps logs

help:
	@echo "起動      make up WEB=nginx     (または WEB=apache)"
	@echo "停止      make down"
	@echo "再現      make app-down         アプリ層(PHP-FPM)を止める"
	@echo "          make web-down         Webサーバー層を止める"
	@echo "          make flag-on          手動スイッチ ON（flag-off で解除）"
	@echo "復旧      make app-up / make web-up WEB=nginx"
	@echo "確認      make status           各層のステータスを表示"
	@echo "          make ps / make logs   コンテナの状態 / ログ（Ctrl+C で終了）"

up:
	docker compose --profile $(WEB) up -d
	@echo "edge: http://localhost:8080   web: http://localhost:8081"

down:
	docker compose --profile nginx --profile apache down

app-down:
	docker compose stop php

app-up:
	docker compose start php

web-down:
	docker compose --profile nginx --profile apache stop web-nginx web-apache

web-up:
	docker compose --profile $(WEB) start web-$(WEB)

flag-on:
	touch state/maintenance.flag

flag-off:
	rm -f state/maintenance.flag

status:
	@for p in 8080 8081; do \
	  echo "localhost:$$p"; \
	  curl -s -o /dev/null -D - --max-time 10 http://localhost:$$p/ \
	    | grep -iE '^(HTTP/|x-maintenance-layer|retry-after)' | sed 's/^/  /' \
	    || echo "  (応答なし)"; \
	done

ps:
	docker compose --profile nginx --profile apache ps

logs:
	docker compose --profile nginx --profile apache logs -f --tail=50
