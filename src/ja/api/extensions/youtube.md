---
description: Your favorite videos and jams - right in your editor!
icon: youtube-line
---

# YouTube

[![Version](https://img.shields.io/npm/v/@tiptap/extension-youtube.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-youtube)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-youtube.svg)](https://npmcharts.com/compare/@tiptap/extension-youtube?minimal=true)

<!-- This extension adds a new youtube embed node to the editor. -->

この拡張機能は、新しい YouTube 埋め込みノードをエディターに追加します。

## インストール

```bash
npm install @tiptap/extension-youtube
```

## 設定

### inline

<!-- Controls if the node should be handled inline or as a block. -->

ノードをインラインで処理するか、ブロックとして処理するかを制御します。

Default: `false`

```js
Youtube.configure({
  inline: false,
})
```

### width

<!-- Controls the default width of added videos -->

追加されたビデオのデフォルトの幅を制御します

Default: `640`

```js
Youtube.configure({
  width: 480,
})
```

### height

<!-- Controls the default height of added videos -->

追加されたビデオのデフォルトの高さを制御します

Default: `480`

```js
Youtube.configure({
  height: 320,
})
```

### controls

<!-- Enables or disables YouTube video controls -->

YouTube ビデオコントロールを有効または無効にします

Default: `true`

```js
Youtube.configure({
  controls: false,
})
```

### nocookie

<!-- Enables the nocookie mode for YouTube embeds -->

YouTube埋め込みのnocookieモードを有効にします

Default: `false`

```js
Youtube.configure({
  nocookie: true,
})
```

### allowFullscreen

<!-- Allows the iframe to be played in fullscreen -->

iframe をフルスクリーンで再生できるようにします

Default: `true`

```js
Youtube.configure({
  allowFullscreen: false,
})
```


## コマンド

### setYoutubeVideo(options)

<!-- Inserts a YouTube iframe embed at the current position -->

現在の位置に埋め込まれたYouTubeiframeを挿入します

```js
editor.commands.setYoutubeVideo({
  src: 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
  width: 640,
  height: 480,
})
```

#### オプション

| オプション | 説明 | 任意 |
| ----- | ----------- | -------- |
| src              | YouTubeビデオのURL。 YouTubeまたはYouTubeMusicのリンクにすることが可能    |          |
| width            | 埋め込み幅（デフォルトオプション、オプション）を上書き  | ✅  |
| height           | 埋め込みの高さ（デフォルトのオプション、オプション）を上書き  | ✅         |


## ソースコード

[packages/extension-youtube/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-youtube/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/YouTube
