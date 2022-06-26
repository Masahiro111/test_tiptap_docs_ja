---
title: Svelte WYSIWYG
tableOfContents: true
---

# Svelte

## はじめに

<!-- The following guide describes how to integrate Tiptap with your [SvelteKit](https://kit.svelte.dev/) project. -->

次のガイドでは、Tiptapを [SvelteKit](https://kit.svelte.dev/) プロジェクトと統合する方法について説明します。

## ショートカットを取る：Tiptapを使用したSvelte REPL

すぐに飛び込みたい場合は、[Svelte REPL with Tiptap](https://svelte.dev/repl/798f1b81b9184780aca18d9a005487d2?version=3.31.2) がインストールされています。

<!-- If you just want to jump into it right-away, here is a [Svelte REPL with Tiptap](https://svelte.dev/repl/798f1b81b9184780aca18d9a005487d2?version=3.31.2) installed. -->

## 要件

* [Node](https://nodejs.org/en/download/) がマシンにインストールされている
* [Svelte](https://vuejs.org/v2/guide/#Getting-Started) の経験

## 1.プロジェクトの作成（オプション）

既存の SvelteKit プロジェクトがある場合は、それでも問題ありません。このステップをスキップして、次のステップに進んでください。

このガイドのために、`my-tiptap-project` と呼ばれる新しいSvelteKitプロジェクトから始めましょう。次のコマンドは、必要なものすべてを設定します。それは多くの質問をしますが、あなたのボートを浮かぶものを使うか、デフォルトを使うだけです。

<!-- If you already have an existing SvelteKit project, that’s fine too. Just skip this step and proceed with the next step. -->

<!-- For the sake of this guide, let’s start with a fresh SvelteKit project called `my-tiptap-project`. The following commands set up everything we need. It asks a lot of questions, but just use what floats your boat or use the defaults. -->

```bash
mkdir my-tiptap-project
cd my-tiptap-project
npm init svelte@next
npm install
npm run dev
```

## 2.依存関係をインストール

さて、退屈な定型文の仕事は十分です。いよいよTiptapをインストールしましょう！次の例では、いくつかのコンポーネントを含む `@tiptap/core` パッケージと、すばやく開始するための最も一般的な拡張機能を備えた `@tiptap/starter-kit` が必要です。

<!-- Okay, enough of the boring boilerplate work. Let’s finally install Tiptap! For the following example you’ll need the `@tiptap/core` package, with a few components, and `@tiptap/starter-kit` which has the most common extensions to get started quickly. -->

```bash
npm install @tiptap/core @tiptap/starter-kit
```

<!-- If you followed step 1 and 2, you can now start your project with `npm run dev`, and open [http://localhost:3000/](http://localhost:3000/) in your favorite browser. This might be different, if you’re working with an existing project. -->

手順1 と 2 を実行した場合は、`npm run dev` を使用してプロジェクトを開始し、お気に入りのブラウザで[http://localhost:3000 /](http://localhost:3000) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

## 3.新しいコンポーネントを作成

Tiptapの使用を実際に開始するには、アプリに新しいコンポーネントを追加する必要があります。それを `Tiptap` と呼び、次のサンプルコードを `src/lib/Tiptap.svelte` に入れましょう。

これは、SvelteKit で Tiptap を起動して実行するための最速の方法です。ボタンのない、非常に基本的なバージョンの Tiptap が提供されます。心配はいりません。まもなく機能を追加できるようになります。

<!-- To actually start using Tiptap, you’ll need to add a new component to your app. Let’s call it `Tiptap` and put the following example code in `src/lib/Tiptap.svelte`. -->

<!-- This is the fastest way to get Tiptap up and running with SvelteKit. It will give you a very basic version of Tiptap, without any buttons. No worries, you will be able to add more functionality soon. -->

```html
<script>
  import { onMount, onDestroy } from 'svelte'
  import { Editor } from '@tiptap/core'
  import StarterKit from '@tiptap/starter-kit'

  let element
  let editor

  onMount(() => {
    editor = new Editor({
      element: element,
      extensions: [
        StarterKit,
      ],
      content: '<p>Hello World! 🌍️ </p>',
      onTransaction: () => {
        // force re-render so `editor.isActive` works as expected
        editor = editor
      },
    })
  })

  onDestroy(() => {
    if (editor) {
      editor.destroy()
    }
  })
</script>

{#if editor}
  <button
    on:click={() => editor.chain().focus().toggleHeading({ level: 1}).run()}
    class:active={editor.isActive('heading', { level: 1 })}
  >
    H1
  </button>
  <button
    on:click={() => editor.chain().focus().toggleHeading({ level: 2 }).run()}
    class:active={editor.isActive('heading', { level: 2 })}
  >
    H2
  </button>
  <button on:click={() => editor.chain().focus().setParagraph().run()} class:active={editor.isActive('paragraph')}>
    P
  </button>
{/if}

<div bind:this={element} />

<style>
  button.active {
    background: black;
    color: white;
  }
</style>
```

## 4.アプリに追加します

次に、`src/routers/index.svelte`のコンテンツを次のサンプルコードに置き換えて、アプリで新しい `Tiptap` コンポーネントを使用します。

```html
<script>
  import Tiptap from '$lib/Tiptap.svelte'
</script>

<main>
  <Tiptap />
</main>
```

<!-- You should now see Tiptap in your browser. Time to give yourself a pat on the back! :) -->

これで、ブラウザにTiptapが表示されます。背中を軽くたたく時間です！ :)
