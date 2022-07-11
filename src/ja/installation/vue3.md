---
title: Vue.js 3 WYSIWYG
tableOfContents: true
---

# Vue.js 3

## はじめに

<!-- The following guide describes how to integrate Tiptap with your [Vue](https://vuejs.org/) CLI project. -->

次のガイドでは、Tiptap を [Vue](https://vuejs.org/) CLI プロジェクトと統合する方法について説明します。

## 要件

* [Node](https://nodejs.org/en/download/) がマシンにインストールされている
* [Vue CLI](https://cli.vuejs.org/) がマシンにインストールされている
* [Vue](https://v3.vuejs.org/guide/introduction.html)

<!-- * [Node](https://nodejs.org/en/download/) installed on your machine
* [Vue CLI](https://cli.vuejs.org/) installed on your machine
* Experience with [Vue](https://v3.vuejs.org/guide/introduction.html) -->

## 1. プロジェクトを作成します（オプション）

既存のVueプロジェクトがある場合は、それでも問題ありません。このステップをスキップして、次のステップに進んでください。

このガイドのために、`my-tiptap-project` と呼ばれる新しい Vue プロジェクトから始めましょう。 Vue CLI は、必要なものをすべてセットアップします。Vue3 テンプレートを選択するだけです。

<!-- If you already have an existing Vue project, that’s fine too. Just skip this step and proceed with the next step. -->

<!-- For the sake of this guide, let’s start with a fresh Vue project called `my-tiptap-project`. The Vue CLI sets up everything we need, just select the Vue 3 template. -->

```bash
# create a project
vue create my-tiptap-project

# change directory
cd my-tiptap-project
```

## 2. 依存関係をインストール

さて、退屈な定型的な作業は十分です。いよいよTiptapをインストールしましょう！次の例では、いくつかのコンポーネントを含む `@tiptap/vue-3` パッケージと、すぐに開始するための最も一般的な拡張機能を備えた `@tiptap/starter-kit` が必要です。

<!-- Okay, enough of the boring boilerplate work. Let’s finally install Tiptap! For the following example you’ll need the `@tiptap/vue-3` package, with a few components, and `@tiptap/starter-kit` which has the most common extensions to get started quickly. -->

```bash
npm install @tiptap/vue-3 @tiptap/starter-kit
```

<!-- If you followed step 1 and 2, you can now start your project with `npm run serve`, and open [http://localhost:8080](http://localhost:8080) in your favorite browser. This might be different, if you’re working with an existing project. -->

手順1 と 2 を実行した場合は、「npm runserve」を使用してプロジェクトを開始し、お気に入りのブラウザで [http://localhost:8080](http://localhost:8080) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

## 3. 新しいコンポーネントを作成します

Tiptap の使用を実際に開始するには、アプリに新しいコンポーネントを追加する必要があります。それを `Tiptap` と呼び、次のサンプルコードを `components/Tiptap.vue` に入れましょう。

これは、Tiptap を Vue で起動して実行するための最速の方法です。ボタンのない、非常に基本的なバージョンの Tiptap が提供されます。心配はいりません。まもなく機能を追加できるようになります。

<!-- To actually start using Tiptap, you’ll need to add a new component to your app. Let’s call it `Tiptap` and put the following example code in `components/Tiptap.vue`. -->

<!-- This is the fastest way to get Tiptap up and running with Vue. It will give you a very basic version of Tiptap, without any buttons. No worries, you will be able to add more functionality soon. -->

```html
<template>
  <editor-content :editor="editor" />
</template>

<script>
import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

export default {
  components: {
    EditorContent,
  },

  data() {
    return {
      editor: null,
    }
  },

  mounted() {
    this.editor = new Editor({
      content: '<p>I’m running Tiptap with Vue.js. 🎉</p>',
      extensions: [
        StarterKit,
      ],
    })
  },

  beforeUnmount() {
    this.editor.destroy()
  },
}
</script>
```

<!-- Alternatively, you can use the Composition API with the `useEditor` method. -->

または、CompositionAPI を `useEditor` メソッドで使用することもできます。

```html
<template>
  <editor-content :editor="editor" />
</template>

<script>
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

export default {
  components: {
    EditorContent,
  },

  setup() {
    const editor = useEditor({
      content: '<p>I’m running Tiptap with Vue.js. 🎉</p>',
      extensions: [
        StarterKit,
      ],
    })

    return { editor }
  },
}
</script>
```

<!-- Or feel free to use the new [`<script setup>` syntax](https://v3.vuejs.org/api/sfc-script-setup.html). -->

または、新しい [`<script setup>` syntax](https://v3.vuejs.org/api/sfc-script-setup.html) を自由に使用してください。

```html
<template>
  <editor-content :editor="editor" />
</template>

<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'

const editor = useEditor({
  content: '<p>I’m running Tiptap with Vue.js. 🎉</p>',
  extensions: [
    StarterKit,
  ],
})
</script>
```

## 4. アプリに追加します

次に、 `src/App.vue` のコンテンツを次のサンプルコードに置き換えて、アプリで新しい `Tiptap` コンポーネントを使用します。

<!-- Now, let’s replace the content of `src/App.vue` with the following example code to use our new `Tiptap` component in our app. -->

```html
<template>
  <div id="app">
    <tiptap />
  </div>
</template>

<script>
import Tiptap from './components/Tiptap.vue'

export default {
  name: 'App',
  components: {
    Tiptap
  }
}
</script>
```

<!-- You should now see Tiptap in your browser. Time to give yourself a pat on the back! :) -->

これで、ブラウザに Tiptap が表示されます。背中を軽くたたく時間です！

## 5. v-model の使用 (optional)

おそらく、フォーム内の `v-model` を使用してデータをバインドすることに慣れているでしょう。これは、Tiptap でも可能です。これが Tiptap でどのように機能するかを示します。

<!-- You’re probably used to binding your data with `v-model` in forms, that’s also possible with Tiptap. Here is how that would work with Tiptap: -->

https://embed.tiptap.dev/preview/GuideGettingStarted/VModel
