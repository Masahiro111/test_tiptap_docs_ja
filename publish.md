

# はじめに

## Tiptap ってなに？

Tiptap は、[ProseMirror](https://ProseMirror.net) のヘッドレスラッパーです。リッチテキスト WYSIWYG エディターを構築するためのツールキットであり、 *New York Times* 、*The Guardian* または *Atlassian* などの多くの有名企業ですでに使用されています。

カスタマイズ可能なビルディングブロックから、必要なリッチテキストエディタを正確に作成します。 Tiptap には、賢明なデフォルト、多くの拡張機能、あらゆる側面をカスタマイズするための使いやすい API が付属しています。ウェルカムなコミュニティ、オープンソースに支えられています。

## 「ヘッドレス」ってどういう意味？

Tiptap が提供しているユーザーインターフェイスはありません。必要なインターフェイスを自由に作成できます。クラスを上書きする必要はありません。`!important` やその他のハックを使用するために、慣れているセットアップで好きなものを書くだけです。

## Tiptap を使用する理由は？

[ProseMirror](https://ProseMirror.net) は、よく書かれた、信頼性が高く、非常に強力なエディターツールキットです。ほとんどの人が探しているすぐに使えるエディタではありませんが、Tiptap を使用すると、数分で開始し、多数のすばらしい拡張機能から選択して、本当に必要なときに強力な ProseMirrorAPI にアクセスできます。



# インストール

## はじめに

<!-- Tiptap is framework-agnostic and even works with Vanilla JavaScript (if that’s your thing). The following integration guides help you integrating Tiptap in your JavaScript project. -->

Tiptap はフレームワークに依存せず、Vanilla JavaScript でも機能します（それがあなたのものである場合）。次の統合ガイドは、JavaScript プロジェクトに Tiptap を統合するのに役立ちます。

## 統合ガイド

* [CDN](/installation/cdn)
* [React](/installation/react)
* [Next.js](/installation/nextjs)
* [Vue 3](/installation/vue3)
* [Vue 2](/installation/vue2)
* [Nuxt.js](/installation/nuxt)
* [Svelte](/installation/svelte)
* [Alpine.js](/installation/alpine)
* [PHP](/installation/php)

### コミュニティの取り組み

* [Angular](https://github.com/sibiraj-s/ngx-tiptap)
* [SolidJS](https://github.com/LXSMNSYC/solid-tiptap)

## バニラJavaScript

<!-- You are using plain JavaScript or a framework that is not listed here? No worries, we provide everything you need. -->

プレーン JavaScript またはここにリストされていないフレームワークを使用していますか？心配いりません、私たちはあなたが必要とするすべてを提供します。

### 1. 依存関係をインストール

<!-- For the following example you will need `@tiptap/core` (the actual editor) and `@tiptap/starter-kit`. -->

<!-- The StarterKit doesn’t include all, but the most common extensions. -->

次の例では、`@tiptap/core`（実際のエディター）と `@tiptap/starter-kit` が必要になります。

StarterKit にはすべてが含まれているわけではありませんが、最も一般的な拡張機能が含まれています。

```bash
npm install @tiptap/core @tiptap/starter-kit
```

### 2. マークアップを追加

<!-- Add the following HTML where you want the editor to be mounted: -->

エディターをマウントする場所に次の HTML を追加します。

```html
<div class="element"></div>
```

### 3. エディターを初期化します

<!-- Everything is in place now, so let’s set up the actual editor now. Add the following code to your JavaScript: -->

これですべてが整ったので、実際のエディターをセットアップしましょう。次のコードを JavaScript に追加します。

```js

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    StarterKit,
  ],
  content: '<p>Hello World!</p>',
})
```

<!-- Open your project in the browser to see Tiptap in action. Good work! -->

ブラウザでプロジェクトを開き、Tiptapの動作を確認します。よくできました！


# React

## はじめに

<!-- The following guide describes how to integrate Tiptap with your [React](https://reactjs.org/) project. We’re using [Create React App](https://reactjs.org/docs/getting-started.html) here, but the workflow should be similar with other setups. -->

次のガイドでは、Tiptap を [React](https://reactjs.org/) プロジェクトと統合する方法について説明します。ここでは[CreateReactApp](https://reactjs.org/docs/getting-started.html) を使用していますが、ワークフローは他の設定と同様である必要があります。

## Reactアプリを作成

### クイックスタート

<!-- If you just want to get up and running with Tiptap you can use the [Tiptap Create React App template by @alb](https://github.com/alb/cra-template-tiptap) to create a new project with all the steps listed below completed already. -->

Tiptap を起動して実行したいだけの場合は、[Tiptap Create React App template by @alb](https://github.com/alb/cra-template-tiptap) を使用して、すべての以下の手順はすでに完了しています。

```bash
npx create-react-app my-tiptap-project --template tiptap
```

### ステップバイステップ

すべての手順を以下に示しますが、動画をご覧になりたい場合は、次の手順もご用意しています。

<!-- All steps are listed below, but if you prefer to watch a video we’ve got something for you, too: -->

https://tiptap.dev/screencasts/installation/install-tiptap-with-create-react-app

#### 1.プロジェクトを作成（オプション）

`my-tiptap-project` と呼ばれる新しい React プロジェクトから始めましょう。 [Reactアプリの作成](https://reactjs.org/docs/getting-started.html) は、必要なものすべてをセットアップします。

<!-- Let’s start with a fresh React project called `my-tiptap-project`. [Create React App](https://reactjs.org/docs/getting-started.html) will set up everything we need. -->

```bash
# create a project with npm
npx create-react-app my-tiptap-project

# change directory
cd my-tiptap-project
```

#### 2.依存関係をインストール

`@tiptap/react` パッケージと[`StarterKit`](/api/extends/starter-kit) をインストールします。これには、すぐに開始できる最も人気のある拡張機能があります。

<!-- Time to install the `@tiptap/react` package and our [`StarterKit`](/api/extensions/starter-kit), which has the most popular extensions to get started quickly. -->

```bash
npm install @tiptap/react @tiptap/starter-kit
```

If you followed step 1 and 2, you can now start your project with `npm run start`, and open [http://localhost:3000](http://localhost:3000) in your browser.

手順1 と 2 を実行した場合は、`npm run start`を使用してプロジェクトを開始し、ブラウザで[http://localhost:3000](http://localhost:3000) を開くことができます。

#### 3.新しいコンポーネントを作成

Tiptap の使用を実際に開始するには、新しいコンポーネントを作成する必要があります。これを `Tiptap` と呼び、次のサンプルコードを `src/Tiptap.jsx` に配置します。

<!-- To actually start using Tiptap we need to create a new component. Let’s call it `Tiptap` and put the following example code in `src/Tiptap.jsx`. -->

```jsx
// src/Tiptap.jsx

const Tiptap = () => {
  const editor = useEditor({
    extensions: [
      StarterKit,
    ],
    content: '<p>Hello World!</p>',
  })

  return (
    <EditorContent editor={editor} />
  )
}

export default Tiptap
```

#### 4.アプリに追加

最後に、`src/App.js` のコンテンツを新しい`Tiptap` コンポーネントに置き換えます。

<!-- Finally, replace the content of `src/App.js` with our new `Tiptap` component. -->

```jsx

const App = () => {
  return (
    <div className="App">
      <Tiptap />
    </div>
  )
}

export default App
```

<!-- You should now see a pretty barebones example of Tiptap in your browser. -->

これで、ブラウザにTiptapの非常に基本的な例が表示されるはずです。

#### 5.完全なセットアップ（オプション）

さらに追加する準備はできましたか？以下は、基本的なツールバーを設定する方法を示すデモです。お気軽にご利用いただき、ニーズに合わせてカスタマイズを開始してください。

<!-- Ready to add more? Below is a demo that shows how you could set up a basic toolbar. Feel free to take it and start customizing it to your needs: -->

https://embed.tiptap.dev/preview/Examples/Default



# Next.js

## はじめに

<!-- The following guide describes how to integrate Tiptap with your [Next.js](https://nextjs.org/) project. -->

次のガイドでは、Tiptap を[Next.js](https://nextjs.org/) プロジェクトと統合する方法について説明します。

## 要件

* [ノード](https://nodejs.org/en/download/) がマシンにインストールされている
* [React](https://reactjs.org/) の経験

<!-- * [Node](https://nodejs.org/en/download/) installed on your machine -->
<!-- * Experience with [React](https://reactjs.org/) -->

## 1. プロジェクトを作成（オプション）

既存の Next.js プロジェクトがある場合は、それでも問題ありません。このステップをスキップして、次のステップに進んでください。

<!-- If you already have an existing Next.js project, that’s fine too. Just skip this step and proceed with the next step. -->

<!-- For the sake of this guide, let’s start with a new Next.js project called `my-tiptap-project`. The following command sets up everything we need to get started. -->

このガイドのために、`my-tiptap-project`という新しい Next.js プロジェクトから始めましょう。次のコマンドは、開始するために必要なすべてを設定します。

```bash
# create a project
npx create-next-app my-tiptap-project

# change directory
cd my-tiptap-project
```

## 2.依存関係をインストール

標準のボイラープレートが設定されたので、Tiptap の起動と実行を開始できます。このためには、`@tiptap/react` と `@tiptap/starter-kit` の2つのパッケージをインストールする必要があります。これらのパッケージにはすぐに開始するために必要なすべての拡張機能が含まれています。

<!-- Now that we have a standard boilerplate set up we can get started on getting Tiptap up and running! For this we will need to install two packages: `@tiptap/react` and `@tiptap/starter-kit` which includes all the extensions you need to get started quickly. -->

```bash
npm install @tiptap/react @tiptap/starter-kit
```

<!-- If you followed step 1 and 2, you can now start your project with `npm run dev`, and open [http://localhost:3000/](http://localhost:3000/) in your favorite browser. This might be different, if you’re working with an existing project. -->

手順1 と 2 を実行した場合は、`npm run dev` を使用してプロジェクトを開始し、お気に入りのブラウザで [http://localhost:3000 /](http://localhost:3000/) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

## 3.新しいコンポーネントを作成

Tiptap の使用を実際に開始するには、アプリに新しいコンポーネントを追加する必要があります。これを行うには、最初に `components/` というディレクトリを作成します。次に、`Tiptap` と呼ぶコンポーネントを作成します。これを行うには、次のサンプルコードを  `components/Tiptap.js` に配置します。

<!-- To actually start using Tiptap, you’ll need to add a new component to your app. To do this, first create a directory called `components/`. Now it's time to create our component which we'll call `Tiptap`. To do this put the following example code in `components/Tiptap.js`. -->

```jsx

const Tiptap = () => {
  const editor = useEditor({
    extensions: [
      StarterKit,
    ],
    content: '<p>Hello World! 🌎️</p>',
  })

  return (
    <EditorContent editor={editor} />
  )
}

export default Tiptap;
```

## 4.アプリに追加

次に、`pages/index.js` のコンテンツを次のサンプルコードに置き換えて、アプリで新しい `Tiptap` コンポーネントを使用します。

<!-- Now, let’s replace the content of `pages/index.js` with the following example code to use our new `Tiptap` component in our app. -->

```jsx

export default function Home() {
    return (
         <Tiptap />
    )
}
```
<!-- You should now see Tiptap in your browser. Time to give yourself a pat on the back! :) -->

これで、ブラウザに Tiptap が表示されます。背中を軽くたたく時間です！ :)



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

## 1. プロジェクトを作成（オプション）

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

## 3. 新しいコンポーネントを作成

Tiptap の使用を実際に開始するには、アプリに新しいコンポーネントを追加する必要があります。それを `Tiptap` と呼び、次のサンプルコードを `components/Tiptap.vue` に入れましょう。

これは、Tiptap を Vue で起動して実行するための最速の方法です。ボタンのない、非常に基本的なバージョンの Tiptap が提供されます。心配はいりません。まもなく機能を追加できるようになります。

<!-- To actually start using Tiptap, you’ll need to add a new component to your app. Let’s call it `Tiptap` and put the following example code in `components/Tiptap.vue`. -->

<!-- This is the fastest way to get Tiptap up and running with Vue. It will give you a very basic version of Tiptap, without any buttons. No worries, you will be able to add more functionality soon. -->

```html
<template>
  <editor-content :editor="editor" />
</template>

<script>

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

const editor = useEditor({
  content: '<p>I’m running Tiptap with Vue.js. 🎉</p>',
  extensions: [
    StarterKit,
  ],
})
</script>
```

## 4. アプリに追加

次に、 `src/App.vue` のコンテンツを次のサンプルコードに置き換えて、アプリで新しい `Tiptap` コンポーネントを使用します。

<!-- Now, let’s replace the content of `src/App.vue` with the following example code to use our new `Tiptap` component in our app. -->

```html
<template>
  <div id="app">
    <tiptap />
  </div>
</template>

<script>

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

## 1. プロジェクトを作成（オプション）

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

## 2. 依存関係をインストール

さて、退屈な定型的な作業は十分です。いよいよ Tiptap をインストールしましょう！次の例では、いくつかのコンポーネントを含む `@tiptap/vue-2` パッケージと、すぐに開始するための最も一般的な拡張機能を備えた `@tiptap/starter-kit` が必要です。

<!-- Okay, enough of the boring boilerplate work. Let’s finally install Tiptap! For the following example you’ll need the `@tiptap/vue-2` package, with a few components, and `@tiptap/starter-kit` which has the most common extensions to get started quickly. -->

```bash
npm install @tiptap/vue-2 @tiptap/starter-kit
```

<!-- If you followed step 1 and 2, you can now start your project with `npm run dev`, and open [http://localhost:8080](http://localhost:8080) in your favorite browser. This might be different, if you’re working with an existing project. -->

手順1 と 2 を実行した場合は、`npm run dev` を使用してプロジェクトを開始し、お気に入りのブラウザで [http://localhost:8080](http://localhost:8080) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

## 3. 新しいコンポーネントを作成

Tiptap の使用を実際に開始するには、アプリに新しいコンポーネントを追加する必要があります。それを `Tiptap` と呼び、次のサンプルコードを `components/Tiptap.vue` に入れましょう。

これは、Tiptap を Vue で起動して実行するための最速の方法です。ボタンのない、非常に基本的なバージョンの Tiptap が提供されます。心配はいりません。まもなく機能を追加できるようになります。

<!-- To actually start using Tiptap, you’ll need to add a new component to your app. Let’s call it `Tiptap` and put the following example code in `components/Tiptap.vue`. -->

<!-- This is the fastest way to get Tiptap up and running with Vue. It will give you a very basic version of Tiptap, without any buttons. No worries, you will be able to add more functionality soon. -->

```html
<template>
  <editor-content :editor="editor" />
</template>

<script>

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

## 5. v-model を使用 (オプション)

おそらく、フォーム内の `v-model` を使用してデータをバインドするために使用されていますが、これは Tiptap でも可能です。これは、プロジェクトに統合できる実用的なサンプルコンポーネントです。

<!-- You’re probably used to bind your data with `v-model` in forms, that’s also possible with Tiptap. Here is a working example component, that you can integrate in your project: -->

```html
<template>
  <editor-content :editor="editor" />
</template>

<script>

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



# Nuxt.js

## はじめに

次のガイドでは、Tiptap を [Nuxt.js](https://nuxtjs.org/) プロジェクトと統合する方法について説明します。

<!-- The following guide describes how to integrate Tiptap with your [Nuxt.js](https://nuxtjs.org/) project. -->

## 要件

* [Node](https://nodejs.org/en/download/) がマシンにインストールされている
* [Vue](https://vuejs.org/v2/guide/#Getting-Started) の経験

<!-- * [Node](https://nodejs.org/en/download/) installed on your machine -->
<!-- * Experience with [Vue](https://vuejs.org/v2/guide/#Getting-Started) -->

## 1.プロジェクトを作成（オプション）

既存の Vue プロジェクトがある場合は、それでも問題ありません。このステップをスキップして、次のステップに進んでください。

<!-- If you already have an existing Vue project, that’s fine too. Just skip this step and proceed with the next step. -->

<!-- For the sake of this guide, let’s start with a fresh Nuxt.js project called `my-tiptap-project`. The following command sets up everything we need. It asks a lot of questions, but just use what floats your boat or use the defaults. -->

このガイドのために、`my-tiptap-project` と呼ばれる新しいNuxt.js プロジェクトから始めましょう。次のコマンドは、必要なものすべてを設定します。それは多くの質問をしますが、あなたのボートを浮かぶものを使うか、デフォルトを使うだけです。

```bash
# create a project
npm init nuxt-app my-tiptap-project

# change directory
cd my-tiptap-project
```

## 2.依存関係をインストール

さて、退屈な定型文の仕事は十分です。いよいよTiptapをインストールしましょう！次の例では、いくつかのコンポーネントを含む `@tiptap/vue-2` パッケージと、すぐに開始するための最も一般的な拡張機能を備えた`@tiptap/starter-kit` が必要です。

<!-- Okay, enough of the boring boilerplate work. Let’s finally install Tiptap! For the following example you’ll need the `@tiptap/vue-2` package, with a few components, and `@tiptap/starter-kit` which has the most common extensions to get started quickly. -->

```bash
npm install @tiptap/vue-2 @tiptap/starter-kit
```

<!-- If you followed step 1 and 2, you can now start your project with `npm run serve`, and open [http://localhost:8080/](http://localhost:8080/) in your favorite browser. This might be different, if you’re working with an existing project. -->

手順1 と 2 を実行した場合は、`npm run serve` を使用してプロジェクトを開始し、お気に入りのブラウザで [http://localhost:8080/](http://localhost:8080/) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

## 3.新しいコンポーネントを作成

Tiptap の使用を実際に開始するには、アプリに新しいコンポーネントを追加する必要があります。これを `TiptapEditor` と呼び、次のサンプルコードを `components/TiptapEditor.vue` に配置します。

<!-- To actually start using Tiptap, you’ll need to add a new component to your app. Let’s call it `TiptapEditor` and put the following example code in `components/TiptapEditor.vue`. -->

<!-- This is the fastest way to get Tiptap up and running with Vue. It will give you a very basic version of Tiptap, without any buttons. No worries, you will be able to add more functionality soon. -->

これは、Tiptap を Vue で起動して実行するための最速の方法です。ボタンのない、非常に基本的なバージョンのTiptapが提供されます。心配はいりません。まもなく機能を追加できるようになります。

```html
<template>
  <editor-content :editor="editor" />
</template>

<script>

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

## 4.アプリに追加

次に、`pages/index.vue` のコンテンツを次のサンプルコードに置き換えて、アプリで新しい `TiptapEditor` コンポーネントを使用します。

<!-- Now, let’s replace the content of `pages/index.vue` with the following example code to use our new `TiptapEditor` component in our app. -->

```html
<template>
  <div>
    <client-only>
      <tiptap-editor />
    </client-only>
  </div>
</template>
<script>
export default {
  components: {
    TiptapEditor
  }
}
</script>
```

<!-- Note that Tiptap needs to run in the client, not on the server. It’s required to wrap the editor in a `<client-only>` tag. [Read more about client-only components.](https://nuxtjs.org/api/components-client-only) -->

<!-- You should now see Tiptap in your browser. Time to give yourself a pat on the back! :) -->

Tiptap は、サーバーではなくクライアントで実行する必要があることに注意してください。エディターを `<client-only>` タグでラップする必要があります。 [クライアント専用コンポーネントの詳細をご覧ください。](https://nuxtjs.org/api/components-client-only) 

これで、ブラウザにTiptapが表示されます。背中を軽くたたく時間です！ :)

## 5. v-model を使用（オプション）

おそらく、フォーム内の `v-model` を使用してデータをバインドするために使用されていますが、これはTiptapでも可能です。これは、プロジェクトに統合できる実用的なサンプルコンポーネントです。

<!-- You’re probably used to bind your data with `v-model` in forms, that’s also possible with Tiptap. Here is a working example component, that you can integrate in your project: -->

https://embed.tiptap.dev/preview/GuideGettingStarted/VModel

```html
<template>
  <editor-content :editor="editor" />
</template>

<script>

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

## 4.アプリに追加

次に、`src/routers/index.svelte`のコンテンツを次のサンプルコードに置き換えて、アプリで新しい `Tiptap` コンポーネントを使用します。

```html
<script>
  </script>

<main>
  <Tiptap />
</main>
```

<!-- You should now see Tiptap in your browser. Time to give yourself a pat on the back! :) -->

これで、ブラウザにTiptapが表示されます。背中を軽くたたく時間です！ :)



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

<!-- If you followed step 1, you can now start your project with `npm run dev`, and open [http://localhost:3000](http://localhost:3000) in your favorite browser. This might be different, if you’re working with an existing project. -->

手順1 を実行した場合は、`npm run dev` を使用してプロジェクトを開始し、お気に入りのブラウザで [http://localhost:3000](http://localhost:3000) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

## 3.エディターの初期化

Tiptap の使用を実際に開始するには、JavaScript を少し作成する必要があります。次のサンプルコードを `main.js` というファイルに入れましょう。

これは、Tiptap を Alpine.js で起動して実行するための最速の方法です。それはあなたにTiptap の非常に基本的なバージョンを与えるでしょう。心配はいりません。まもなく機能を追加できるようになります。

<!-- To actually start using Tiptap, you’ll need to write a little bit of JavaScript. Let’s put the following example code in a file called `main.js`. -->

<!-- This is the fastest way to get Tiptap up and running with Alpine.js. It will give you a very basic version of Tiptap. No worries, you will be able to add more functionality soon. -->

```js

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



# PHP

## はじめに

<!-- You can use Tiptap with Laravel, Livewire, Inertia.js, [Alpine.js](/installation/alpine), [Tailwind CSS](/guide/styling#with-tailwind-css), and even - yes you read that right - inside PHP. -->

Tiptap は、Laravel、Livewire、Inertia.js、[Alpine.js](/installation/alpine)、[Tailwind CSS](/guide/styling#with-tailwind-css) で使用できます。もちろん、ライセンスもお読みください。

## PHPのヒント

[Tiptap コンテンツを処理するための公式PHPパッケージ](/api/utilities/tiptap-php) を提供しています。Tiptap コンテンツを処理するためのPHPパッケージ。 Tiptap 互換の JSON を HTML に変換したり、その逆を行ったり、コンテンツをサニタイズしたり、単に変更したりすることができます。

<!-- We provide [an official PHP package to work with Tiptap content](/api/utilities/tiptap-php). A PHP package to work with Tiptap content. You can transform Tiptap-compatible JSON to HTML, and the other way around, sanitize your content, or just modify it. -->

## Laravel Livewire

### my-livewire-component.blade.php

```html
<!--
  In your livewire component you could add an
  autosave method to handle saving the content
  from the editor every 10 seconds if you wanted
-->
<x-editor
  wire:model="foo"
  wire:poll.10000ms="autosave"
></x-editor>
```

### editor.blade.php

```html
<div
  x-data="setupEditor(
    $wire.entangle('{{ $attributes->wire('model') }}').defer
  )"
  x-init="() => init($refs.editor)"
  wire:ignore
  {{ $attributes->whereDoesntStartWith('wire:model') }}
>
  <div x-ref="editor"></div>
</div>
```

### index.js

```js

window.setupEditor = function (content) {
  return {
    editor: null,
    content: content,

    init(element) {
      this.editor = new Editor({
        element: element,
        extensions: [
          StarterKit,
        ],
        content: this.content,
        onUpdate: ({ editor }) => {
          this.content = editor.getHTML()
        }
      })

      this.$watch('content', (content) => {
        // If the new content matches TipTap's then we just skip.
        if (content === this.editor.getHTML()) return

        /*
          Otherwise, it means that a force external to TipTap
          is modifying the data on this Alpine component,
          which could be Livewire itself.
          In this case, we just need to update TipTap's
          content and we're good to do.
          For more information on the `setContent()` method, see:
            https://www.tiptap.dev/api/commands/set-content
        */
        this.editor.commands.setContent(content, false)
      })
    }
  }
}
```

