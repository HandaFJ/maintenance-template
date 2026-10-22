<?php
// デモ用のアプリ。このページが見えていれば、アプリ層は正常に動いている。
header('Content-Type: text/html; charset=utf-8');
$software = $_SERVER['SERVER_SOFTWARE'] ?? 'unknown';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>デモアプリ（稼働中）｜灯台屋 / まちの小さなWeb屋さん</title>
  <style>
    :root {
      /* ▼ ブランドに合わせて変更する色（昼の灯台・青空と白い壁の雰囲気） */
      --bg: #f4f7f9;
      /* 背景（爽やかで明るいペールブルーグレー） */
      --card-bg: #ffffff;
      /* カードの背景（清潔感のある白） */
      --text: #2c3e50;
      /* 本文（引き締まったダークネイビー） */
      --muted: #6c7a89;
      /* 補足テキスト */
      --accent: #d9822b;
      /* 強調（お昼の太陽や温かい光を思わせるオレンジ） */
      --border: #e2e8f0;
      /* 枠線 */
      /* ▼ 外部フォントは使わず OS 標準フォントのみ */
      --font: "Hiragino Sans", "Hiragino Kaku Gothic ProN", "Yu Gothic UI",
        "Yu Gothic", "Noto Sans JP", Meiryo, sans-serif;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
      margin: 0;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: var(--font);
      line-height: 1.8;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      -webkit-font-smoothing: antialiased;
    }

    .page {
      width: 100%;
      max-width: 38rem;
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: clamp(32px, 6vw, 48px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .brand {
      margin: 0 0 1.5rem;
      font-size: 0.875rem;
      font-weight: 700;
      letter-spacing: .12em;
      color: var(--accent);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    /* 小さな灯りのシンボルマーク */
    .brand::before {
      content: "";
      display: inline-block;
      width: 8px;
      height: 8px;
      background: var(--accent);
      border-radius: 50%;
      box-shadow: 0 0 8px rgba(217, 130, 43, 0.4);
    }

    main {
      margin-bottom: 2rem;
    }

    h1 {
      margin: 0 0 1rem;
      font-size: clamp(1.7rem, 4.5vw, 2.4rem);
      font-weight: 700;
      line-height: 1.4;
      letter-spacing: .03em;
    }

    .lead {
      margin: 0 0 2rem;
      color: var(--muted);
      font-size: 0.95rem;
    }

    dl {
      margin: 0;
      padding: 1.25rem;
      background: #f8fafc;
      border: 1px solid var(--border);
      border-radius: 8px;
    }

    dt {
      margin: 0 0 0.2rem;
      color: var(--accent);
      font-size: .8125rem;
      font-weight: 700;
    }

    dd {
      margin: 0 0 1rem;
      font-size: .9375rem;
    }

    dd:last-child {
      margin-bottom: 0;
    }

    code {
      background: #eef2f3;
      padding: .15em .4em;
      border-radius: 4px;
      font-size: 0.9em;
    }

    footer {
      margin: 0;
      color: var(--muted);
      font-size: .75rem;
      border-top: 1px solid var(--border);
      padding-top: 1.25rem;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="page">
    <p class="brand">灯台屋 / まちの小さなWeb屋さん</p>

    <main>
      <h1>デモアプリは稼働中です</h1>
      <p class="lead">
        このページが見えている間は、PHP-FPM（アプリ層）が正常に動いています。
      </p>

      <dl>
        <dt>稼働状況</dt>
        <dd>
          Webサーバー: <code><?= htmlspecialchars($software, ENT_QUOTES, 'UTF-8') ?></code><br>
          時刻: <code><?= date('H:i:s') ?></code>
        </dd>
        <dt>次のアクション</dt>
        <dd>ターミナルで <code>make app-down</code> を実行して、再読み込みしてみてください。</dd>
      </dl>
    </main>

    <footer>&copy; 灯台屋 / まちの小さなWeb屋さん</footer>
  </div>
</body>

</html>