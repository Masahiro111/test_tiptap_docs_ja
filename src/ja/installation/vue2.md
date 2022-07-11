---
title: Vue.js 2 WYSIWYG
tableOfContents: true
---

# Vue.js 2

## はじめに

<!-- The following guide describes how to integrate Tiptap with your [Vue](https://vuejs.org/) CLI project. -->

次のガイドでは、Tiptapを[Vue](https://vuejs.org/) CLIプロジェクトと統合する方法について説明します。

## 要件

* [Node](https://nodejs.org/en/download/) がマシンにインストールされている
* [Vue CLI](https://cli.vuejs.org/) がマシンにインストールされている
* [Vue]の経験(https://vuejs.org/v2/guide/#Getting-Started)

<!-- ## Requirements
* [Node](https://nodejs.org/en/download/) installed on your machine
* [Vue CLI](https://cli.vuejs.org/) installed on your machine
* Experience with [Vue](https://vuejs.org/v2/guide/#Getting-Started) -->

## 1. プロジェクトを作成します（オプション）

既存のVueプロジェクトがある場合は、それでも問題ありません。このステップをスキップして、次のステップに進んでください。

<!-- If you already have an existing Vue project, that’s fine too. Just skip this step and proceed with the next step. -->

<!-- For the sake of this guide, let’s start with a fresh Vue project called `my-tiptap-project`. The Vue CLI sets up everything we need, just select the default Vue 2 template. -->

このガイドのために、`my-tiptap-project` と呼ばれる新しい Vue プロジェクトから始めましょう。 Vue CLI は、必要なものをすべてセットアップします。デフォルトの Vue2 テンプレートを選択するだけです。

```bash
# create a project
vue create my-tiptap-project

# change directory
cd my-tiptap-project
```

## 2. 依存関係をインストールします

さて、退屈な定型的な作業は十分です。いよいよ Tiptap をインストールしましょう！次の例では、いくつかのコンポーネントを含む `@tiptap/vue-2` パッケージと、すぐに開始するための最も一般的な拡張機能を備えた `@tiptap/starter-kit` が必要です。

<!-- Okay, enough of the boring boilerplate work. Let’s finally install Tiptap! For the following example you’ll need the `@tiptap/vue-2` package, with a few components, and `@tiptap/starter-kit` which has the most common extensions to get started quickly. -->

```bash
npm install @tiptap/vue-2 @tiptap/starter-kit
```

<!-- If you followed step 1 and 2, you can now start your project with `npm run dev`, and open [http://localhost:8080](http://localhost:8080) in your favorite browser. This might be different, if you’re working with an existing project. -->

手順1 と 2 を実行した場合は、`npm run dev` を使用してプロジェクトを開始し、お気に入りのブラウザで [http://localhost:8080](http://localhost:8080) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

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
import { Editor, EditorContent } from '@tiptap/vue-2'
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

  beforeDestroy() {
    this.editor.destroy()
  },
}
</script>
```

## 4. アプリに追加

次に、`src/App.vue` のコンテンツを次のサンプルコードに置き換えて、アプリで新しい `Tiptap` コンポーネントを使用します。

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

## 5. v-model を使用する (オプション)

おそらく、フォーム内の `v-model` を使用してデータをバインドするために使用されていますが、これは Tiptap でも可能です。これは、プロジェクトに統合できる実用的なサンプルコンポーネントです。

<!-- You’re probably used to bind your data with `v-model` in forms, that’s also possible with Tiptap. Here is a working example component, that you can integrate in your project: -->

```html
<template>
  <editor-content :editor="editor" />
</template>

<script>
import { Editor, EditorContent } from '@tiptap/vue-2'
import StarterKit from '@tiptap/starter-kit'

export default {
  components: {
    EditorContent,
  },

  props: {
    value: {
      type: String,
      default: '',
    },
  },

  data() {
    return {
      editor: null,
    }
  },

  watch: {
    value(value) {
      // HTML
      const isSame = this.editor.getHTML() === value

      // JSON
      // const isSame = JSON.stringify(this.editor.getJSON()) === JSON.stringify(value)

      if (isSame) {
        return
      }

      this.editor.commands.setContent(value, false)
    },
  },

  mounted() {
    this.editor = new Editor({
      content: this.value,
      extensions: [
        StarterKit,
      ],
      onUpdate: () => {
        // HTML
        this.$emit('input', this.editor.getHTML())

        // JSON
        // this.$emit('input', this.editor.getJSON())
      },
    })
  },

  beforeDestroy() {
    this.editor.destroy()
  },
}
</script>
```
