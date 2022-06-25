---
title: Alpine WYSIWYG
tableOfContents: true
---

# Alpine.js

## はじめに

<!-- The following guide describes how to integrate Tiptap with your [Alpine.js](https://github.com/alpinejs/alpine) project. -->

<!-- For the sake of this guide we’ll use [Vite](https://vitejs.dev/) to quickly set up a project, but you can use whatever you’re used to. Vite is just really fast and we love it. -->

次のガイドでは、Tiptap を [Alpine.js](https://github.com/alpinejs/alpine) プロジェクトと統合する方法について説明します。

このガイドでは、[Vite](https://vitejs.dev/) を使用してプロジェクトをすばやく設定しますが、慣れているものなら何でも使用できます。 Vite は本当に高速で、私たちはそれが大好きです。

## 要件

<!-- * [Node](https://nodejs.org/en/download/) installed on your machine -->
<!-- * Experience with [Alpine.js](https://github.com/alpinejs/alpine) -->

* [Node](https://nodejs.org/en/download/) がマシンにインストールされている
* [Alpine.js](https://github.com/alpinejs/alpine) の経験

## 1. プロジェクトの作成（オプション）

既存の Alpine.js プロジェクトがある場合は、それでも問題ありません。このステップをスキップして、次のステップに進んでください。

<!-- If you already have an existing Alpine.js project, that’s fine too. Just skip this step and proceed with the next step. -->

このガイドのために、 `my-tiptap-project` という新しい [Vite](https://vitejs.dev/) プロジェクトから始めましょう。 Vite は必要なものをすべてセットアップします。Vanilla JavaScript テンプレートを選択するだけです。

<!-- For the sake of this guide, let’s start with a fresh [Vite](https://vitejs.dev/) project called `my-tiptap-project`. Vite sets up everything we need, just select the Vanilla JavaScript template. -->

```bash
npm init vite@latest my-tiptap-project -- --template vanilla
cd my-tiptap-project
npm install
npm run dev
```

## 2. 依存関係のインストール

さて、退屈な定型文の仕事は十分です。いよいよTiptapをインストールしましょう！次の例では、 `alpinejs`、`@tiptap/core` パッケージ、および最も一般的な拡張機能を備えた  `@tiptap/starter-kit` が必要です。

<!-- Okay, enough of the boring boilerplate work. Let’s finally install Tiptap! For the following example you’ll need `alpinejs`, the `@tiptap/core` package and the `@tiptap/starter-kit` which has the most common extensions to get started quickly. -->

```bash
npm install alpinejs @tiptap/core @tiptap/starter-kit
```

If you followed step 1, you can now start your project with `npm run dev`, and open [http://localhost:3000](http://localhost:3000) in your favorite browser. This might be different, if you’re working with an existing project.

手順1 を実行した場合は、`npm run dev` を使用してプロジェクトを開始し、お気に入りのブラウザで [http://localhost:3000](http://localhost:3000) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

## 3.エディターの初期化

Tiptap の使用を実際に開始するには、JavaScript を少し作成する必要があります。次のサンプルコードを `main.js` というファイルに入れましょう。

これは、Tiptap を Alpine.js で起動して実行するための最速の方法です。それはあなたにTiptap の非常に基本的なバージョンを与えるでしょう。心配はいりません。まもなく機能を追加できるようになります。

<!-- To actually start using Tiptap, you’ll need to write a little bit of JavaScript. Let’s put the following example code in a file called `main.js`. -->

<!-- This is the fastest way to get Tiptap up and running with Alpine.js. It will give you a very basic version of Tiptap. No worries, you will be able to add more functionality soon. -->

```js
import Alpine from 'alpinejs'
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

window.setupEditor = function(content) {
  return {
    editor: null,
    content: content,
    updatedAt: Date.now(), // force Alpine to rerender on selection change
    init(element) {
      this.editor = new Editor({
        element: element,
        extensions: [
          StarterKit,
        ],
        content: this.content,
        onUpdate: ({ editor }) => {
          this.content = editor.getHTML()
        },
        onSelectionUpdate: () => {
          this.updatedAt = Date.now()
        },
      })
    },
  }
}

window.Alpine = Alpine
Alpine.start()
```

## 4.アプリに追加

それでは、`index.html`　のコンテンツを次のサンプルコードに置き換えて、アプリでエディターを使用してみましょう。

<!-- Now, let’s replace the content of the `index.html` with the following example code to use the editor in our app. -->

```html
<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <div x-data="setupEditor('<p>Hello World! :-)</p>')" x-init="() => init($refs.element)">

    <template x-if="editor">
      <div class="menu">
        <button
          @click="editor.chain().toggleHeading({ level: 1 }).focus().run()"
          :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }"
        >
          H1
        </button>
        <button
          @click="editor.chain().toggleBold().focus().run()"
          :class="{ 'is-active': editor.isActive('bold') }"
        >
          Bold
        </button>
        <button
          @click="editor.chain().toggleItalic().focus().run()"
          :class="{ 'is-active': editor.isActive('italic') }"
        >
          Italic
        </button>
      </div>
    </template>

    <div x-ref="element"></div>
  </div>

  <script type="module" src="/main.js"></script>

  <style>
    body { margin: 2rem; font-family: sans-serif; }
    button.is-active { background: black; color: white; }
    .ProseMirror { padding: 0.5rem 1rem; margin: 1rem 0; border: 1px solid #ccc; }
  </style>
</body>
</html>
```

<!-- You should now see Tiptap in your browser. Time to give yourself a pat on the back! :) -->

これで、ブラウザに Tiptap が表示されます。背中を軽くたたく時間です！ :)
