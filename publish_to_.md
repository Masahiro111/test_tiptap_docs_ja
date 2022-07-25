

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

<!-- If you followed step 1 and 2, you can now start your project with `npm run start`, and open [http://localhost:3000](http://localhost:3000) in your browser. -->

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



# アップグレードガイド

## はじめに

<!-- First of all, Tiptap v1 isn’t supported anymore and won’t receive any further updates. -->

<!-- Yes, it’s tedious work to upgrade your favorite text editor to a new API, but we made sure you’ve got enough reasons to upgrade to the newest version. -->

まず、Tiptap v1 はサポートされなくなり、それ以上のアップデートは受信されなくなります。

お気に入りのテキストエディタを新しいAPIにアップグレードするのは面倒な作業ですが、最新バージョンにアップグレードする十分な理由があることを確認しました。

<!-- * Autocompletion in your IDE (thanks to TypeScript)
* Amazing documentation with 100+ pages and 100+ interactive examples
* Active development, new features in the making, new releases every week
* Tons of new extensions
* Well-tested code base -->

* IDEでのオートコンプリート（TypeScriptのおかげで）
* 100以上のページと100以上のインタラクティブな例を含むすばらしいドキュメント
* 活発な開発、作成中の新機能、毎週の新リリース
* たくさんの新しい拡張機能
* 十分にテストされたコードベース

<!-- The new API will look pretty familiar to you, but there are a ton of changes though. To make the upgrade a little bit easier, here is everything you need to know: -->

新しい API は見覚えがありますが、多くの変更があります。アップグレードを少し簡単にするために、知っておく必要のあるすべてがここにあります。

## Tiptap v1をアンインストールします

<!-- The whole package structure has changed, we even moved to another npm namespace, so you’ll need to remove the old version entirely before upgrading to Tiptap 2. -->

<!-- Otherwise you’ll run into an exception, for example “looks like multiple versions of prosemirror-model were loaded”. -->

パッケージ構造全体が変更され、別の npm 名前空間に移動したため、Tiptap 2 にアップグレードする前に古いバージョンを完全に削除する必要があります。

そうしないと「 "looks like multiple versions of prosemirror-model were loaded" (複数のバージョンのprosemirror-model がロードされたように見えます) 」などの例外が発生します。

```bash
npm uninstall tiptap tiptap-commands tiptap-extensions tiptap-utils
```

## Tiptap v2 をインストールします

<!-- Once you have uninstalled the old version of Tiptap, install the new Vue 2 package and the starter kit: -->

古いバージョンの Tiptap をアンインストールしたら、新しい Vue2 パッケージとスターターキットをインストールします。

```bash
npm install @tiptap/vue-2 @tiptap/starter-kit
```

## Tiptap v2 を最新の状態に保つ

Tiptapのアップデートを常にリリースしています。

<!-- We are constantly releasing updates to Tiptap. -->

残念ながら、npm には依存関係を簡単に更新する統合ツールはありませんが、`npm-check` パッケージを使用できます。

<!-- Unfortunately, for npm there is no integrated tool to easily update your dependencies, but you can use the `npm-check` package: -->

```bash
npm install -g npm-check
npm-check -u
```

## ドキュメント、テキスト、段落の拡張子を明示的に登録する

tiptap v1 は、デフォルト設定の `useBuiltInExtensions: true` を使用して、いくつかの必要な拡張機能を非表示にしようとしました。その設定は削除されており、すべての拡張機能をインポートする必要があります。少なくとも [`Document`](/api/nodes/document) 、[`Paragraph`](/api/nodes/paragraph) と [`Text`](/api/nodes/text) 拡張子を明示的にインポートしてください。

<!-- tiptap 1 tried to hide a few required extensions from you with the default setting `useBuiltInExtensions: true`. That setting has been removed and you’re required to 
```js

new Editor({
  extensions: [
    Document,
    Paragraph,
    Text,
    // all your other extensions
  ],
})
```

<!-- And we removed some settings: `dropCursor`, `enableDropCursor`, and `enableGapCursor`. Those are separate extensions now: [`Dropcursor`](/api/extensions/dropcursor) and [`Gapcursor`](/api/extensions/gapcursor). You probably want to load them, but if you don’t, just ignore this. -->

そして、`dropCursor`、` enableDropCursor`、および`enableGapCursor`等、いくつかの設定を削除しました。 これらは現在、別々の拡張機能となっています（ [`Dropcursor`](/api/extends/dropcursor) と [`Gapcursor`](/api/extends/gapcursor)）。 通常は、それらをロードして使用できますが、この機能がいらない場合は、無視していただいて結構です。

## 拡張機能の新しい名前

lowerCamelCase に切り替えたため、多くのタイプ名が変更されました。 コンテンツを JSON として保存した場合は、コンテンツをループして名前を変更する必要があります。 すみません。

<!-- We switched to lowerCamelCase, so there’s a lot type names that changed. If you stored your content as JSON you need to loop through it and rename them. Sorry for that one. -->

| 古い名前              | 新しい名前               |
| --------------------- | ---------------------- |
| ~~`bullet_list`~~     | `bulletList`           |
| ~~`code_block`~~      | `codeBlock`            |
| ~~`hard_break`~~      | `hardBreak`            |
| ~~`horizontal_rule`~~ | `horizontalRule`       |
| ~~`list_item`~~       | `listItem`             |
| ~~`ordered_list`~~    | `orderedList`          |
| ~~`table_cell`~~      | `tableCell`            |
| ~~`table_header`~~    | `tableHeader`          |
| ~~`table_row`~~       | `tableRow`             |
| ~~`todo_list`~~       | `taskList` (new name!) |
| ~~`todo_item`~~       | `taskItem` (new name!) |

## 削除されたメソッド

`state()` メソッドを削除しました。 心配はいりませんが、`editor.state` から引き続き利用できます。

<!-- We removed the `.state()` method. No worries though, it’s still available through `editor.state`. -->

## 新しい拡張 API

プロジェクト用にいくつかのカスタム拡張機能を構築した場合は、新しいAPIに合うようにそれらを書き直す必要があります。 心配はいりませんが、多くの作業を続けることができます。 `schema`、`commands`、`keys`、` inputRules`、および  `pasteRules` はすべて、以前と同じように機能します。 登録方法が違うだけです。

<!-- In case you’ve built some custom extensions for your project, you’re required to rewrite them to fit the new API. No worries, you can keep a lot of your work though. The `schema`, `commands`, `keys`, `inputRules` and `pasteRules` all work like they did before. It’s just different how you register them. -->

```js

const CustomExtension = Node.create({
  name: 'custom_extension',
  addOptions() {
    …
  },
  addAttributes() {
    …
  },
  parseHTML() {
    …
  },
  renderHTML({ node, HTMLAttributes }) {
    …
  },
  addCommands() {
    …
  },
  addKeyboardShortcuts() {
    …
  },
  addInputRules() {
    …
  },
  // and more …
})
```

<!-- Read more about [all the nifty details building custom extensions](/guide/custom-extensions) in our guide. -->

ガイドで [カスタム拡張機能を構築するためのすべての気の利いた詳細](/guide/custom-extensions) の詳細をお読みください。

## 名前を変更した設定とメソッド

[多くの設定とメソッドの名前を変更しました](/api/editor)。 うまくいけば、検索と置換を使用して新しい API に移行できます。 変更点のリストは次のとおりです。

<!-- [We renamed a lot of settings and methods](/api/editor). Hopefully you can migrate to the new API with search & replace. Here is a list of what changed: -->

| 古い名前        | 新しい名前    |
| --------------- | ----------- |
| ~~`autoFocus`~~ | `autofocus` |

## コマンドの名前を変更

すべての新しい拡張機能には、スタイルを設定、設定解除、および切り替えるための特定のコマンドが付属しています。 したがって、`.bold()` の代わりに、`.toggleBold()` になりました。 また、lowerCamelCase に切り替えました。以下にいくつかの例を示します。 あぁ、`todo_list` の名前を `taskList` に変更しました。申し訳ありません。

<!-- All new extensions come with specific commands to set, unset and toggle styles. So instead of `.bold()`, it’s now `.toggleBold()`. Also, we switched to lowerCamelCase, below are a few examples. Oh, and we renamed `todo_list`, to `taskList`, sorry for that one. -->

| 古いコマンド              |  新しいコマンド                     |
| ------------------------ | ------------------------------- |
| `.redo()`                | `.redo()` (nothing changed)     |
| `.undo()`                | `.undo()` (nothing changed)     |
| ~~`.todo_list()`~~       | `.toggleTaskList()` (new name!) |
| ~~`.blockquote()`~~      | `.toggleBlockquote()`           |
| ~~`.bold()`~~            | `.toggleBold()`                 |
| ~~`.bullet_list()`~~     | `.toggleBulletList()`           |
| ~~`.code()`~~            | `.toggleCode()`                 |
| ~~`.code_block()`~~      | `.toggleCodeBlock()`            |
| ~~`.hard_break()`~~      | `.setHardBreak()`               |
| ~~`.heading()`~~         | `.toggleHeading()`              |
| ~~`.horizontal_rule()`~~ | `.setHorizontalRule()`          |
| ~~`.italic()`~~          | `.toggleItalic()`               |
| ~~`.link()`~~            | `.toggleLink()`                 |
| ~~`.ordered_list()`~~    | `.toggleOrderedList()`          |
| ~~`.paragraph()`~~       | `.setParagraph()`               |
| ~~`.strike()`~~          | `.toggleStrike()`               |
| ~~`.underline()`~~       | `.toggleUnderline()`            |
| …                        | …                               |

## メニューバー、バブルメニューバー、フローティングメニュー

<!-- Read the dedicated [guide on creating menus](/guide/menus) to migrate your menus. -->

専用の [メニュー作成ガイド](/guide/menus) を読んで、メニューを移行してください。

## コマンドをチェーンできるようになりました

現在、ほとんどのコマンドを1つの呼び出しに組み合わせることができます。 ほとんどの場合、これは個別の関数呼び出しよりも短くなります。 選択したテキストを太字にする例を次に示します。

<!-- Most commands can be combined to one call now. That’s shorter than separate function calls in most cases. Here is an example to make the selected text bold: -->

```js
editor.chain().toggleBold().focus().run()
```

<!-- The `.chain()` is required to start a new chain and the `.run()` is needed to actually execute all the commands in between. Read more about [the new Tiptap commands](/api/commands) in our API documentation. -->

新しいチェーンを開始するには `.chain()` が必要であり、その間のすべてのコマンドを実際に実行するには `.run()` が必要です。 [新しいTiptapコマンド](/api/commands) の詳細については、API ドキュメントをご覧ください。

## .focus() はすべてのコマンドで呼び出されません

Tiptap v1 で `.focus()` コマンドを非表示にしようとし、すべてのコマンドでそれを実行しました。 これにより、特定のユースケースで問題が発生しました。コマンドを実行したいが、エディターに焦点を合わせたくない場合です。

Tiptap v2 では、明示的に `focus()` を呼び出す必要があり、おそらく多くの場所でそれを実行したいと思うでしょう。 次に例を示します。

<!-- We tried to hide the `.focus()` command from you with Tiptap 1 and executed that on every command. That led to issues in specific use cases, where you want to run a command, but don’t want to focus the editor. -->

<!-- With Tiptap v2 you have to explicitly call the `focus()` and you probably want to do that in a lot of places. Here is an example: -->

```js
editor.chain().focus().toggleBold().run()
```

## イベントコールバックのパラメータは少なくなります

新しいイベントコールバックには、より少ないパラメーターがあります。 同じことが `this.` から利用できるようになりました。 [イベントの詳細については、こちらをご覧ください。](/api/events) 

<!-- The new event callbacks have fewer parameters. The same things should be available through `this.` now. [Read more about events here.](/api/events) -->

## 協調編集

協調編集のリファレンス実装では、現在 Y.js を使用しています。 それはまったく別のことです。 Tiptap 1 拡張機能は引き続き使用できますが、新しい拡張機能 API に適合させるかどうかはユーザー次第です。 これを行った場合は、ここからリンクできるように、忘れずに共有してください。

<!-- The reference implementation for collaborative editing uses Y.js now. That’s a whole different thing. You still can use the Tiptap 1 extension, but it’s up to you to adapt it to the new extension API. If you’ve done this, don’t forget to share it with us so we can link to it from here! -->

<!-- Read more about [the new collaborative editing experience](/guide/collaborative-editing) in our guide. -->

ガイドで [新しい協調編集体験](/guide/collaborative-editing) の詳細をご覧ください。

## マークはノードビューをサポートしなくなりました

<!-- For marks, node views are [not well supported in ProseMirror](https://discuss.prosemirror.net/t/there-is-a-bug-in-marks-nodeview/2722/2). There is also [a related issue](https://github.com/ueberdosis/tiptap/issues/613) for Tiptap 1. That’s why we removed it in Tiptap 2. -->

マークの場合、ノードビューは [ProseMirrorでは十分にサポートされていません](https://discuss.prosemirror.net/t/there-is-a-bug-in-marks-nodeview/2722/2)  Tiptap 1には [関連する問題](https://github.com/ueberdosis/tiptap/issues/613)もあります。そのため、Tiptap 2 で削除しました。

## スポンサーになる

<!-- tiptap wouldn’t exist without the funding of its community. If you fell in love with Tiptap, don’t forget to [become a sponsor](/sponsor) and make the maintenance, development and support sustainable. -->

<!-- In exchange, we’ll take you into our hearts, invite you to private repositories, add a `sponsor ♥` label to your issues and pull requests and more. -->

Tiptapは、コミュニティの資金がなければ存在しませんでした。 Tiptap に恋をした場合は、 [become a sponsor](/sponsor) を忘れずに、メンテナンス、開発、サポートを持続可能なものにしてください。

引き換えに、私たちはあなたを私たちの心に連れて行き、あなたをプライベートリポジトリに招待し、あなたの問題に「スポンサー♥」ラベルを追加し、リクエストをプルします。



# 変更ログ

<!-- Tiptap consists of more than 50 separate packages, so it’s not that easy to keep that one big changelog. We got you covered though. Here is everything you need to follow the development during the beta phase: -->

Tiptapは50を超える個別のパッケージで構成されているため、その1つの大きな変更ログを保持するのはそれほど簡単ではありません。 しかし、私たちはあなたをカバーしてもらいました。 ベータ段階で開発をフォローするために必要なものはすべて次のとおりです。

1. [コアパッケージの変更ログ](https://github.com/ueberdosis/tiptap/blob/main/packages/core/CHANGELOG.md) はGitHub のここにあります。
2. すべてのパッケージには [個別の`CHANGELOG.md`](https://github.com/ueberdosis/tiptap/blob/main/packages) もあります。
3. ベータ期間中は、[GitHubでマージされたプルリクエスト](https://github.com/ueberdosis/tiptap/pulls?q=is%3Apr+is%3Aclosed) を監視することも役立ちます。
4. そして、公開された issue で[安定したリリースの前に何をしたいのか](https://github.com/ueberdosis/tiptap/issues/2087)  を追跡します。.

<!-- Once we’re transitioning to a stable version, [we’ll write blog posts](/blog) about bigger changes and keep them in a changelog here. -->

安定版に移行したら、大きな変更について[ブログ投稿を作成](/blog)、ここで変更ログに保存します。


# プロジェクトについて

## はじめに

<!-- To deliver a top-notch developer experience and user experience, we put ~~hundreds~~ thousands of hours of unpaid work into Tiptap. Your funding helps us to make this work more and more financially sustainable. This enables us to provide helpful support, maintain all our packages, keep everything up to date, and develop new features and extensions for Tiptap. -->

一流の開発者エクスペリエンスとユーザーエクスペリエンスを提供するために、私たちは ~~数百~~ 数千時間の無給の仕事を Tiptap に投入しました。あなたの資金は、私たちがこの仕事をますます財政的に持続可能なものにするのに役立ちます。これにより、役立つサポートを提供し、すべてのパッケージを維持し、すべてを最新の状態に保ち、Tiptap の新しい機能と拡張機能を開発することができます。

オープンソースコミュニティに戻って、 [GitHubでスポンサーになってください](https://github.com/sponsors/ueberdosis)! ♥

## スポンサーとしてのあなたのメリット💖

<!-- * Get early access to private repositories
* Your issues and pull requests get a `sponsor ♥` label
* Get a sponsor badge in all your comments on GitHub
* Invest in the future of Tiptap
* Give back to the open source community
* Show support in your GitHub profile -->

* プライベートリポジトリへの早期アクセスを取得する
* あなたの問題とプルリクエストは `スポンサー♥` ラベルを取得します
* GitHub へのすべてのコメントでスポンサーバッジを取得する
* Tiptap の未来に投資する
* オープンソースコミュニティに還元する
* GitHub プロファイルでサポートを表示する

良くない? [GitHubでスポンサーになろうよ!](https://github.com/sponsors/ueberdosis)

## The maintainers of Tiptap

<!-- If you are thankful for Tiptap, you should say thank you to the lovely people at [überdosis](https://ueberdosis.io), the company that builds this software. -->

<!-- AND you should definitely hire us if you want us to design und build an amazing digital product for you. Bonus points if it’s somehow text editing related. -->

Tiptap を使用して「素晴らしい！」と思ってくれたら、この Tiptap を作っている会社 [überdosis](https://ueberdosis.io) の素敵な人々に感謝を述べてくれると嬉しいです。

そして、あなたが私たちにあなたのために素晴らしいデジタル製品を設計して構築したいのなら、あなたは間違いなく私たちを雇うべきです。どういうわけかテキスト編集に関連している場合はボーナスポイント。

!!チームグリッド

## より安心

<!-- Companies betting on Tiptap probably want some peace of mind and ensure that we keep maintaining Tiptap, but don’t forget that our work is based on the work of other lovely people that you should definitely sponsor too: -->

Tiptap 使用して利益をあげている企業は、おそらくある程度の安定を望んでおり、Tiptap を維持し続けることを保証しますが、私たちの仕事は、間違いなく後援する必要がある他の素敵な人々の仕事に基づいていることを忘れないでください。

* [Sponsor Marijn Haverbeke](https://marijnhaverbeke.nl/fund/) (ProseMirror)
* [Sponsor Kevin Jahns](https://github.com/sponsors/dmonad) (Y.js)
* [Sponsor Y-Collective](https://opencollective.com/y-collective) (Y.js + Tiptap)

## よくある質問

### GitHubを使用できません。どうすればあなたをサポートできますか？

会社の場合、GitHubを使用したくない、クレジットカードを持っていない、または適切な請求書が必要な場合は、[humans@tiptap.dev](mailto:humans@tiptap) までご連絡ください。

<!-- If you’re a company, don’t want to use GitHub, don’t have a credit card or want a proper invoice from us, just reach out to us at [humans@tiptap.dev](mailto:humans@tiptap.dev). -->

<!-- We are part of the [Y-Collective](https://opencollective.com/y-collective), a fund for projects related to Y.js (the technology we’re using for all the collaborative editing magic). That’s an OpenCollective, which allows you to send money through transfer, PayPal or credit card. Donations are tax deductible for US companies. -->

私たちは、Y.js（すべての協調編集の魔法に使用しているテクノロジー）に関連するプロジェクトの基金である[Y-Collective](https://opencollective.com/y-collective) の一部です。これは OpenCollective であり、送金、PayPal、またはクレジットカードで送金できます。米国企業の寄付は税控除の対象となります。

### 相談したいです。価格はいくらくらいですか？

問題や質問がある場合、何かを話したい場合、または何か他のことをしたい場合は、[GitHubの問題を使用してください](https://github.com/ueberdosis/tiptap/issues/new/choose) すべてにアクセスできるようにしてくださいコミュニティ。それ以外の場合は、[humans@tiptap.dev](mailto:humans@tiptap.dev) に連絡してください。限られた数のカスタム開発およびコンサルティング契約を引き受けることができます。

<!-- If you have an issue, a question, want to talk something through or anything else, [please use GitHub issues](https://github.com/ueberdosis/tiptap/issues/new/choose) to keep everything accessible to the whole community. For everything else, reach out to [humans@tiptap.dev](mailto:humans@tiptap.dev). We can take on a limited number of custom development and consulting contracts. -->

### 電話してもらえますか？

いいえ、私たちは非同期通信の大ファンです。本当に非公開で連絡する必要がある場合は、[humans@tiptap.dev](mailto:humans@tiptap.dev) にメールを送信してください。ただし、技術的なメールサポートは期待しないでください。それはすべて[GitHub](https://github.com/ueberdosis/tiptap/issues) で発生します

<!-- Nope, we are big fans of asynchronous communication. If you really need to reach out in private, send us an email to [humans@tiptap.dev](mailto:humans@tiptap.dev), but don’t expect technical email support. That all happens on [GitHub](https://github.com/ueberdosis/tiptap/issues) -->



# 貢献

## はじめに

<!-- tiptap would be nothing without its lively community. Contributions have always been and will always be welcome. Here is a little bit you should know, before you send your contribution: -->

活気のあるコミュニティがなければ、tiptapは何もありません。貢献はこれまでも、そしてこれからも歓迎されます。投稿を送信する前に、知っておくべきことが少しあります。

## 歓迎すべき例

<!-- * Failing regression tests as bug reports -->
<!-- * Documentation improvements, e. g. fix a typo, add a section -->
<!-- * New features for existing extensions, e. g. a new configureable option -->
<!-- * Well explained, non-breaking changes to the core -->

* バグレポートとしての回帰テストの失敗
* ドキュメントの改善。例えば、タイプミスを修正し、セクションを追加する
* 既存の拡張機能の新機能。 例えば、新しい構成可能なオプション
* よく説明された、コアへの非破壊的な変更


## マージされません

<!-- * New extensions, which we then need to support and maintain -->

* 新しい拡張機能。サポートと保守が必要です。

## アイデアを送信する

必ず問題を開いて、最初にアイデアの概要を説明してください。すぐにご連絡いたします。寄付を統合できる可能性がある場合はお知らせします。

<!-- Make sure to open an issue and outline your idea first. We’ll get back to you quickly and let you know if there is a chance we can merge your contribution. -->

## 開発環境をセットアップする

公式リポジトリをいじくり回すのはそれほど難しくありません。 [Git](https://github.com/git-guides/install-git)、[Node and NPM](https://nodejs.org/en/download/) をインストールする必要があります。次に行う必要があることは次のとおりです。

<!-- It’s not too hard to tinker around with the official repository. You’ll need [Git](https://github.com/git-guides/install-git), [Node and NPM](https://nodejs.org/en/download/) installed. Here is what you need to do then: -->

1. コードをローカルマシンにコピーします `$ git clone git@github.com:ueberdosis/tiptap.git`
2. 依存関係をインストールします `$ npm install`
3. 開発環境を開始します `$ npm run start`
4. お気に入りのブラウザで http://localhost:3000 を開きます
5. 遊び始めましょう！


## コードスタイル

一貫したコードスタイルを保証する eslint 構成があります。エラーをチェックするには、 `$ npm run lint` を実行します。プルリクエストを送信するときにもチェックされます。プルリクエストを送信する前に、パスしていることを確認してください。

<!-- There is an eslint config that ensures a consistent code style. To check for errors, run `$ npm run lint`. That’ll be checked when you send a pull request, too. Make sure it’s passing, before sending a pull request. -->

## エラーのテスト

プルリクエストは、既存のすべてのテストを自動的に実行します。プルリクエストを送信する前に、すべてパスしていることを確認してください。`$ npm run test`を使用してすべてのテストをローカルで実行するか、`$ npm run test:open`を使用して単一のテストを実行します（新しいテストを作成する場合など）。

<!-- Your pull request will automatically execute all our existing tests. Make sure that they all pass, before sending a pull request. Run all tests locally with `$ npm run test` or run single tests (e. g. when writing new ones) with `$ npm run test:open`. -->

## その他の質問

さらに質問がありますか？リポジトリに新しい問題またはディスカッションを作成します。折り返しご連絡いたします。

<!-- Any further questions? Create a new issue or discussion in the repository. We’ll get back to you. -->

# 仕事

<!-- You enjoy to work with Tiptap? You are not alone. Some amazing companies are looking for developers with some Tiptap and/or [Hocuspocus](https://hocuspocus.dev) experience. -->

Tiptap での作業を楽しんでいますか？ あなた一人じゃありません。 一部の素晴らしい企業は、Tiptap や [Hocuspocus](https://hocuspocus.dev) の経験を持つ開発者を探しています。

- **[Software Engineer](https://gamma.app/docs/Software-Engineer-6s0e0grm9zk9w5s) @ Gamma**<br>
React · Tiptap · San Francisco, USA

- **[Senior Fullstack Engineer](https://dociq.notion.site/Senior-Fullstack-Engineer-e6336ba6e9864c89858c70eea81e5691) @ Contract Vault**<br>
Vue.js · Tiptap · Node.js · PostgreSQL · Remote, Switzerland

- **[Senior Frontend Engineer](https://dociq.notion.site/Senior-Frontend-Engineer-0926648fac544a6b870a0024f2861c12) @ Contract Vault**<br>
Vue.js · Tiptap · Remote, Switzerland

- **[Experienced Front-end Engineer](https://outstanding-ulna-0e8.notion.site/Sigle-Experienced-Front-end-engineer-f8b1bab84afd4c89a2053c6685c317e0) @ Sigle**<br>
React · Tiptap · web 3.0 · Remote

- **[Editor Front-end Engineer](https://typecell.notion.site/Prosemirror-TipTap-developer-47c9c12213964b148bc74ea540ba830c) @ TypeCell**<br>
Open Source · Tiptap · ProseMirror · React · Remote

- **[Javascript Engineer, Software Engineer, …](https://birdeatsbug.com/jobs/?source=tiptapdev) @ Bird Eats Bug**<br>
Vue.js · Tiptap · Remote · Berlin, Germany

- **[Frontend Developer](https://bitcrowd.net/jobs) @ bitcrowd**<br>
Tiptap · Remote · Berlin, Germany

- **[Frontend Developer](https://nextapphq.notion.site/nextapphq/Frontend-Developer-Prosemirror-244ccf55ca7248489aaea052be32cd36) @ NEXT**<br>
React · Remirror · Remote · Amsterdam, Netherlands

<!-- Is your company hiring, too? We have [200,000 page views/month](https://plausible.io/tiptap.dev?period=30d) from people who love to work with Tiptap. Maybe we can help you find the right person. Reach out to [humans@tiptap.dev](mailto:humans@tiptap.dev) with a link to your job description! -->

あなたの会社も採用していますか？ Tiptap を使用するのが大好きな人から、[200,000ページビュー/月](https://plausible.io/tiptap.dev?period=30d) があります。 たぶん私たちはあなたが適切な人を見つけるのを手伝うことができます。 職務内容へのリンクを添えて[humans@tiptap.dev](mailto:humans@tiptap.dev) に連絡してください。
# デフォルトのテキストエディタ

エディターのレンダリングを完全に制御できることをお伝えしましたか？ これは、スタイリングがないが、一般的な拡張機能のセット全体が詰め込まれた最低限の例です。

<!-- Did we mention that you have full control over the rendering of the editor? Here is a barebones example without any styling, but packed with a whole set of common extensions. -->

https://embed.tiptap.dev/preview/Examples/Default



# コラボ編集

## はじめに

<!-- This example shows how you can use Tiptap to let multiple users collaborate in the same document in real-time. -->

<!-- It connects all clients to a WebSocket server and merges changes to the document with the power of [Y.js](https://github.com/yjs/yjs). If you want to learn more about collaborative text editing, check out [our guide on collaborative editing](/guide/collaborative-editing). -->

この例は、Tiptap を使用して、複数のユーザーが同じドキュメントでリアルタイムに共同作業できるようにする方法を示しています。

すべてのクライアントを WebSocket サーバーに接続し、[Y.js](https://github.com/yjs/yjs) の機能を使用してドキュメントへの変更をマージします。協調編集について詳しく知りたい場合は、[協調編集に関するガイド](/guide/collaborative-editing) をご覧ください。

## 例

> **警告共有ドキュメント**
いいね！このエディタのコンテンツは、インターネットの他のユーザーと共有されます。

<!-- :::warning Shared Document
Be nice! The content of this editor is shared with other users from the Internet.
::: -->

https://embed.tiptap.dev/preview/Examples/CollaborativeEditing

## バックエンド

<!-- In case you’re wondering what kind of sorcery you need on the server to achieve this, here is the whole backend code for the demo: -->

:::warning Request early access
Our plug & play collaboration backend hocuspocus is still work in progress. If you want to give it a try, [get early access](https://www.hocuspocus.dev).
:::

これを実現するためにサーバーにどのような種類のソーサリーが必要か疑問に思われる場合は、デモのバックエンドコード全体を次に示します。

> 警告早期アクセスをリクエストする
>プラグアンドプレイコラボレーションバックエンド hocuspocus はまだ進行中です。 試してみたい場合は、[早期アクセスを取得](https://www.hocuspocus.dev) してください。

```js

const server = Server.configure({
  port: 80,
  extensions: [
    new RocksDB({ path: './database' }),
  ],
})

server.listen()
```

# マークダウンショートカット

https://embed.tiptap.dev/preview/Examples/MarkdownShortcuts

# メニュー

https://embed.tiptap.dev/preview/Examples/Menus

# テーブル

https://embed.tiptap.dev/preview/Examples/Tables

# 画像

## pro … はどうですか

サイズ変更可能な画像、キャプション付きの画像、フローティング画像など、画像に関連する機能をさらに構築したいと考えています。ただし、それには時間がかかります。

何千人もの開発者が毎日 Tiptap を使用していますが、それでも私たちのフルタイムの仕事ではありません。 それを変えたいのです。 あなたは私たちが私たちの目標を達成するのを手伝うことができますか？

<!-- :::pro What about …
We’d love to build more features related to images: Resizeable images, images with a caption, floating images … But that takes time. -->

<!-- Though thousands of developers use Tiptap every day, it’s still not our full-time job. We’d like to change that. Are you able to help us reach our goal? -->

[GitHub でスポンサーになる →](https://github.com/sponsors/ueberdosis)

https://embed.tiptap.dev/preview/Examples/Images

# フォーマット

https://embed.tiptap.dev/preview/Examples/Formatting

# タスク

https://embed.tiptap.dev/preview/Examples/Tasks

# 長文テキスト

<!-- This demo has more than 200,000 words, check the performance yourself. -->

このデモには 200,000 語以上あります。パフォーマンスを自分で確認してください。

https://embed.tiptap.dev/preview/Examples/Book

# ドローイング

<!-- Did you ever wanted to draw in a text editor? Me neither. Anyway, here is an example how that could work with Tiptap. If you want to build something like that, [learn more about node views](/guide/node-views). -->

テキストエディタで描きたいと思ったことはありますか？ Tiptap では以下のようにテキストエディタを使用してドロー機能を利用できます。 そのようなものを構築したい場合は、[ノードビューの詳細](/guide/node-views) をご覧ください。

https://embed.tiptap.dev/preview/Examples/Drawing

# メンション

https://embed.tiptap.dev/preview/Examples/Community

# 最小限のセットアップ

https://embed.tiptap.dev/preview/Examples/Minimal


# カスタム ドキュメント

https://embed.tiptap.dev/preview/Examples/CustomDocument

# 賢いエディター

https://embed.tiptap.dev/preview/Examples/Savvy

# 双方向性

<!-- Thanks to [node views](/guide/node-views) you can add interactivity to your nodes. If you can write it in JavaScript, you can add it to the editor. -->

[ノードビュー](/guide/node-views) のおかげで、ノードに双方向性を追加できます。 JavaScript で記述できる場合は、エディターに追加できます。

https://embed.tiptap.dev/preview/Examples/InteractivityComponent

https://embed.tiptap.dev/preview/Examples/InteractivityComponentContent

# シンタックス ハイライト

https://embed.tiptap.dev/preview/Examples/CodeBlockLanguage



# 構成

## はじめに

<!-- For most cases it’s enough to say where Tiptap should be rendered (`element`), what functionalities you want to enable (`extensions`) and what the initial document should be (`content`). -->

<!-- A few more things can be configured though. Let’s look at a fully configured editor example. -->

ほとんどの場合、Tiptap をレンダリングする場所（`element`）、有効にする機能（`extensions`）、最初のドキュメントを指定するだけで十分です（`content`）。

ただし、さらにいくつか設定することができます。完全に構成されたエディターの例を見てみましょう。

## エディターを構成する

構成を追加するには、次に示すように、[設定のあるオブジェクト](/api/editor) を `Editor`クラスに渡します。

<!-- To add your configuration, pass [an object with settings](/api/editor) to the `Editor` class, like shown here: -->

```js

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    Document,
    Paragraph,
    Text,
  ],
  content: '<p>Example Text</p>',
  autofocus: true,
  editable: true,
  injectCSS: false,
})
```

<!-- This will do the following: -->

1. bind Tiptap to `.element`,
2. load the `Document`, `Paragraph` and `Text` extensions,
3. set the initial content,
4. place the cursor in the editor after initialization,
5. make the text editable (but that’s the default anyway), and
6. disable the loading of [the default CSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) (which is not much anyway).


これにより、次のことが行われます。

1. Tiptap を `.element` にバインドします。
2. `Document`、`Paragraph`、および `Text` 拡張機能をロードします。
3. 初期コンテンツを設定します。
4. 初期化後、カーソルをエディタに置きます。
5. テキストを編集可能にし（ただし、とにかくそれがデフォルトです）。
6. [デフォルトのCSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) の読み込みを無効にします（とにかくそれほど多くはありません）。

## ノード、マーク、拡張機能

ほとんどの編集機能は、[node](/api/nodes)、[mark](/api/marks)、または [extension](/api/extensions) としてバンドルされています。必要なものをインポートし、それらを配列としてエディターに渡します。

これは、3つの拡張機能のみを使用した最小限のセットアップです。

<!-- Most editing features are bundled as [node](/api/nodes), [mark](/api/marks) or [extension](/api/extensions). Import what you need and pass them as an array to the editor. -->

<!-- Here is the minimal setup with only three extensions: -->

```js

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    Document,
    Paragraph,
    Text,
  ],
})
```

### 拡張機能を構成する

ほとんどの拡張機能を構成できます。`.configure()` を追加し、それにオブジェクトを渡します。

次の例では、デフォルトの見出しレベル4、5、および6を無効にし、1、2、および 3のみを許可します。

<!-- Most extensions can be configured. Add a `.configure()` and pass an object to it. -->

<!-- The following example will disable the default heading levels 4, 5 and 6 and just allow 1, 2 and 3: -->

```js

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    Document,
    Paragraph,
    Text,
    Heading.configure({
      levels: [1, 2, 3],
    }),
  ],
})
```

<!-- Have a look at the documentation of the extension you are using to learn more about their settings. -->

それらの設定の詳細については、使用している拡張機能のドキュメントを参照してください。

### デフォルトの拡張機能

最も一般的な拡張機能のいくつかを`StarterKit` 拡張機能にバンドルしました。これを使用する方法は次のとおりです。

<!-- We have bundled a few of the most common extensions into a `StarterKit` extension. Here is how you to use that: -->

```js

new Editor({
  extensions: [
    StarterKit,
  ],
})
```

<!-- You can even pass a configuration for all included extensions as an object. Just prefix the configuration with the extension name: -->

含まれているすべての拡張機能の構成をオブジェクトとして渡すこともできます。構成の前に拡張子名を付けるだけです。

```js

new Editor({
  extensions: StarterKit.configure({
    heading: {
      levels: [1, 2, 3],
    },
  }),
})
```

<!-- The `StarterKit` extension loads the most common extensions, but not all available extensions. If you want to load additional extensions or add a custom extension, add them to the `extensions` array: -->

`StarterKit` 拡張機能は最も一般的な拡張機能をロードしますが、利用可能なすべての拡張機能をロードするわけではありません。追加の拡張機能をロードしたり、カスタム拡張機能を追加したりする場合は、それらを `extensions` 配列に追加します。

```js

new Editor({
  extensions: [
    StarterKit,
    Strike,
  ],
})
```

<!-- Don’t want to load a specific extension from the `StarterKit`? Just pass `false` to the config: -->

`StarterKit` から特定の拡張機能をロードしたくないですか？設定に `false` を渡すだけです。

```js

new Editor({
  extensions: [
    StarterKit.configure({
      history: false,
    }),
  ],
})
```

<!-- You will probably see something like that in collaborative editing examples. The [`Collaboration`](/api/extensions/collaboration) comes with its own history extension. You need to remove or disable the default [`History`](/api/extensions/history) extension to avoid conflicts. -->

協調編集の例では、おそらくそのようなものが見られるでしょう。 [`Collaboration`](/api/extensions/collaboration) には、独自の履歴拡張機能が付属しています。競合を避けるために、デフォルトの[`History`](/api/extensions/history) 拡張機能を削除または無効にする必要があります。


# メニューの作成する

## はじめに

Tiptap は非常に生々しいものですが、それは良いことです。あなたはそれの外観について完全に制御できます。

フルコントロールとは、それを意味します。自分でメニューを作成することができます（そして作成する必要があります）。私たちはあなたがすべてを配線するのを手伝います。

<!-- tiptap comes very raw, but that’s a good thing. You have full control about the appearance of it. -->

<!-- When we say full control, we mean it. You can (and have to) build a menu on your own. We help you to wire everything up. -->

## メニュー

エディターは、コマンドをトリガーしてアクティブ状態を追加するための流暢な API を提供します。好きなマークアップを使用できます。メニューの配置を簡単にするために、いくつかのユーティリティとコンポーネントを提供しています。最も一般的なユースケースを1つずつ見ていきましょう。

<!-- The editor provides a fluent API to trigger commands and add active states. You can use any markup you like. To make the positioning of menus easier, we provide a few utilities and components. Let’s go through the most typical use cases one by one. -->

### 固定メニュー

たとえばエディタの上にある固定メニューは、何でもかまいません。そのようなメニューは提供していません。いくつかの `<button>` を含む `<div>` を追加するだけです。これらのボタンが[コマンド](/api/commands) をトリガーする方法は、[以下で説明(explained below)](#actions) です。

<!-- A fixed menu, for example on top of the editor, can be anything. We don’t provide such menu. Just add a `<div>` with a few `<button>`s. How those buttons can trigger [commands](/api/commands) is [explained below](#actions). -->

### バブルメニュー

テキストを選択すると、[バブルメニュー](/api/extensions/bubble-menu)  が表示されます。マークアップとスタイリングは完全にあなた次第です。

<!-- The [bubble menu](/api/extensions/bubble-menu) appears when selecting text. Markup and styling is totally up to you. -->

https://embed.tiptap.dev/preview/Extensions/BubbleMenu?hideSource

### フローティングメニュー

[フローティングメニュー](/api/extensions/floating-menu)  が空の行に表示されます。マークアップとスタイリングは完全にあなた次第です。

<!-- The [floating menu](/api/extensions/floating-menu) appears in empty lines. Markup and styling is totally up to you. -->

https://embed.tiptap.dev/preview/Extensions/FloatingMenu?hideSource

### スラッシュコマンド（進行中の作業）

これはまだ公式の拡張機能ではありませんが、[スラッシュコマンドと呼ばれるものを追加するために使用できる実験があります](/experiments/commands) 。これにより、 `/` で新しい行を開始でき、追加するノードを選択するためのポップアップが表示されます。

<!-- It’s not an official extension yet, but [there’s an experiment you can use to add what we call slash commands](/experiments/commands). It allows you to start a new line with `/` and will bring up a popup to select which node should be added. -->

## ボタン

<!-- Okay, you’ve got your menu. But how do you wire things up? -->

さて、あなたはあなたのメニューを持っています。しかし、どのように物事を配線しますか？

### コマンド

<!-- You’ve got the editor running already and want to add your first button. You need a `<button>` HTML tag with a click handler. Depending on your setup, that can look like the following example: -->

エディターが既に実行されていて、最初のボタンを追加したいとします。クリックハンドラー付きの `<button>` HTML タグが必要です。設定によっては、次の例のようになります。

```html
<button onclick="editor.chain().focus().toggleBold().run()">
  Bold
</button>
```

<!-- Oh, that’s a long command, right? Actually, it’s a [chain of commands](/api/commands#chain-commands). Let’s go through this one by one: -->

少し長い命令でしたか？実際には、[コマンドのチェーン](/api/commands#chain-commands) です。これを1つずつ見ていきましょう。

```js
editor.chain().focus().toggleBold().run()
```

<!-- 1. `editor` should be a Tiptap instance,
2. `chain()` is used to tell the editor you want to execute multiple commands,
3. `focus()` sets the focus back to the editor,
4. `toggleBold()` marks the selected text bold, or removes the bold mark from the text selection if it’s already applied and
5. `run()` will execute the chain. -->

1. `editor` は Tiptap インスタンスである必要があります。
2. `chain()` は 複数のコマンドを実行することをエディターに通知するために使用されます。
3. `focus()` は フォーカスをエディターに戻します。
4. `toggleBold()`は 選択したテキストを太字でマークします。すでに適用されている場合は、テキスト選択から太字のマークを削除します。
5. `run()` は チェーンを実行します。

言い換えると、これはテキストエディタの典型的な **太字** ボタンになります。

使用できるコマンドは、エディターに登録した拡張機能によって異なります。ほとんどの拡張機能には、 `set…()`、 `unset…()`、および `toggle…()`コマンドが付属しています。拡張機能のドキュメントを読んで、実際に利用できるものを確認するか、コードエディタのオートコンプリートを確認してください。

<!-- In other words: This will be a typical **Bold** button for your text editor. -->

<!-- Which commands are available depends on what extensions you have registered with the editor. Most extensions come with a `set…()`, `unset…()` and `toggle…()` command. Read the extension documentation to see what’s actually available or just surf through your code editor’s autocomplete. -->

### フォーカスを維持

上記の例では、すでに `focus()` コマンドを見てきました。ボタンをクリックすると、ブラウザはそのDOM要素にフォーカスを合わせ、エディタはフォーカスを失います。すべてのメニューボタンに `focus()` を追加して、ユーザーの書き込みフローが中断されないようにすることができます。

<!-- You have already seen the `focus()` command in the above example. When you click on the button, the browser focuses that DOM element and the editor loses focus. It’s likely you want to add `focus()` to all your menu buttons, so the writing flow of your users isn’t interrupted. -->

### アクティブ状態

エディタには、選択したテキストに何かがすでに適用されているかどうかを確認するための `isActive()` メソッドが用意されています。 Vue.js では、次のような関数を使用して CSS クラスを切り替えることができます。

<!-- The editor provides an `isActive()` method to check if something is applied to the selected text already. In Vue.js you can toggle a CSS class with help of that function like that: -->

```html
<button :class="{ 'is-active': editor.isActive('bold') }" @click="editor.chain().focus().toggleBold().run()">
  Bold
</button>
```

<!-- This toggles the `.is-active` class accordingly and works for nodes and marks. You can even check for specific attributes. Here is an example with the [`Highlight`](/api/marks/highlight) mark, that ignores different attributes: -->

これにより、それに応じて `.is-active` クラスが切り替わり、ノードとマークに対して機能します。特定の属性を確認することもできます。さまざまな属性を無視する [`Highlight`](/api/marks/highlight) マークの例を次に示します。

```js
editor.isActive('highlight')
```

<!-- And an example that compares the given attribute(s): -->

そして、与えられた属性を比較する例：

```js
editor.isActive('highlight', { color: '#ffa8a8' })
```

<!-- There is even support for regular expressions: -->


正規表現もサポートされています。

```js
editor.isActive('textStyle', { color: /.*/ })
```

<!-- You can even nodes and marks, but check for the attributes only. Here is an example with the [`TextAlign`](/api/extensions/text-align) extension: -->

ノードやマークを付けることもできますが、属性のみを確認してください。 [`TextAlign`](/api/extensions/text-align) 拡張機能の例を次に示します。

```js
editor.isActive({ textAlign: 'right' })
```

<!-- If your selection spans multiple nodes or marks, or only part of the selection has a mark, `isActive()` will return `false` and indicate nothing is active. This is how it is supposed to be, because it allows people to apply a new node or mark to that selection right-away. -->

選択範囲が複数のノードまたはマークにまたがっている場合、または選択範囲の一部にのみマークが付いている場合、 `isActive()` は  `false` を返し、アクティブなものがないことを示します。これは、人々が新しいノードまたはマークをその選択にすぐに適用できるようにするため、想定されている方法です。

## ユーザー体験

優れたユーザーエクスペリエンスを設計するときは、いくつかのことを考慮する必要があります。

<!-- When designing a great user experience you should consider a few things. -->

### アクセシビリティ

* ユーザーがキーボードでメニューをナビゲートできることを確認してください
* 適切な [タイトル属性](https://developer.mozilla.org/de/docs/Web/HTML/Global_attributes/title) を使用する
* 適切な [aria属性](https://developer.mozilla.org/en-US/docs/Learn/Accessibility/WAI-ARIA_basics)を使用する
* 利用可能なキーボードショートカットを一覧表示します

> **警告が不完全です**
このセクションにはいくつかの作業が必要です。エディターメニューを作成するときに他に何を考慮する必要があるか知っていますか？ [GitHub](https://github.com/ueberdosis/tiptap) でお知らせいただくか、[humans@tiptap.dev](mailto:humans@tiptap.dev) にメールを送信してください

<!-- * Make sure users can navigate the menu with their keyboard
* Use proper [title attributes](https://developer.mozilla.org/de/docs/Web/HTML/Global_attributes/title)
* Use proper [aria attributes](https://developer.mozilla.org/en-US/docs/Learn/Accessibility/WAI-ARIA_basics)
* List available keyboard shortcuts -->

<!-- :::warning Incomplete
This section needs some work. Do you know what else needs to be taken into account when building an editor menu? Let us know on [GitHub](https://github.com/ueberdosis/tiptap) or send us an email to [humans@tiptap.dev](mailto:humans@tiptap.dev)!
::: -->

### アイコン

<!-- Most editor menus use icons for their buttons. In some of our demos, we use the open source icon set [Remix Icon](https://remixicon.com/), which is free to use. But it’s totally up to you what you use. Here are a few icon sets you can consider: -->

ほとんどのエディタメニューは、ボタンにアイコンを使用しています。 一部のデモでは、無料で使用できるオープンソースのアイコンセット[Remix Icon](https://remixicon.com/) を使用しています。 しかし、何を使用するかは完全にあなた次第です。 検討できるアイコンセットは次のとおりです。

* [Remix Icon](https://remixicon.com/#editor)
* [Font Awesome](https://fontawesome.com/icons?c=editors)
* [UI icons](https://www.ibm.com/design/language/iconography/ui-icons/library/)



# スタイリング

## はじめに

tiptap is headless, that means there is no styling provided. That also means, you are in full control of how your editor looks. The following methods allow you to apply custom styles to the editor.

Tiptap はヘッドレスです。つまり、スタイリングは提供されません。これは、エディターの外観を完全に制御できることも意味します。次のメソッドを使用すると、カスタムスタイルをエディターに適用できます。

## オプション1：プレーンHTMLのスタイルを設定する

<!-- The whole editor is rendered inside of a container with the class `.ProseMirror`. You can use that to scope your styling to the editor content: -->

エディター全体は、クラス `.ProseMirror` を持つコンテナー内にレンダリングされます。これを使用して、スタイリングをエディターコンテンツにスコープすることができます。

```css
/* Scoped to the editor */
.ProseMirror p {
  margin: 1em 0;
}
```

<!-- If you’re rendering the stored content somewhere, there won’t be a `.ProseMirror` container, so you can just globally add styling to the used HTML tags: -->

保存されたコンテンツをどこかにレンダリングする場合、`.ProseMirror` コンテナはないため、使用する HTML タグにスタイルをグローバルに追加できます。

```css
/* Global styling */
p {
  margin: 1em 0;
}
```

## オプション2：カスタムクラスを追加する

すべてにクラスを追加することを含め、レンダリング全体を制御できます。

<!-- You can control the whole rendering, including adding classes to everything. -->

### 拡張機能

<!-- Most extensions allow you to add attributes to the rendered HTML through the `HTMLAttributes` option. You can use that to add a custom class (or any other attribute). That’s also very helpful, when you work with [Tailwind CSS](https://tailwindcss.com/). -->

ほとんどの拡張機能では、`HTMLAttributes` オプションを使用してレンダリングされたHTMLに属性を追加できます。これを使用して、カスタムクラス（またはその他の属性）を追加できます。 [Tailwind CSS](https://tailwindcss.com/) を使用する場合にも、これは非常に役立ちます。

```js
new Editor({
  extensions: [
    Document,
    Paragraph.configure({
      HTMLAttributes: {
        class: 'my-custom-paragraph',
      },
    }),
    Heading.configure({
      HTMLAttributes: {
        class: 'my-custom-heading',
      },
    }),
    Text,
  ],
})
```

レンダリングされたHTMLは次のようになります。

```html
<h1 class="my-custom-heading">Example Text</p>
<p class="my-custom-paragraph">Wow, that’s really custom.</p>
```

<!-- If there are already classes defined by the extensions, your classes will be added. -->

拡張機能によって定義されたクラスがすでに存在する場合は、クラスが追加されます。

### エディター

<!-- You can even pass classes to the element which contains the editor like that: -->

次のようなエディターを含む要素にクラスを渡すこともできます。

```js
new Editor({
  editorProps: {
    attributes: {
      class: 'prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto focus:outline-none',
    },
  },
})
```

### TailwindCSSを使用

エディターはTailwindCSSでも正常に動作します。以下の `@tailwindcss/typography` プラグインでスタイル設定された例を見つけてください。

<!-- The editor works fine with Tailwind CSS, too. Find an example that’s styled with the `@tailwindcss/typography` plugin below. -->

https://embed.tiptap.dev/preview/Experiments/Tailwind

## オプション3：HTMLをカスタマイズする

または、拡張機能のマークアップをカスタマイズできます。次の例では、`<strong>` タグではなく、`<b>` タグをレンダリングするカスタムの太字の拡張機能を作成します。

<!-- Or you can customize the markup for extensions. The following example will make a custom bold extension that doesn’t render a `<strong>` tag, but a `<b>` tag: -->

```js

const CustomBold = Bold.extend({
  renderHTML({ HTMLAttributes }) {
    // Original:
    // return ['strong', HTMLAttributes, 0]
    return ['b', HTMLAttributes, 0]
  },
})

new Editor({
  extensions: [
    // …
    CustomBold,
  ],
})
```

カスタム拡張機能は別のファイルに入れる必要がありますが、私はあなたがその考えを理解したと思います。

<!-- You should put your custom extensions in separate files, but I think you got the idea. -->



# 出力

## はじめに

<!-- You can store your content as a JSON object or as a good old HTML string. Both work fine. And of course, you can pass both formats to the editor to restore your content. Here is an interactive example, that exports the content as HTML and JSON when the document is changed: -->

コンテンツは JSON オブジェクトまたは古き良き HTML 文字列として保存できます。どちらも正常に動作します。もちろん、両方の形式をエディターに渡してコンテンツを復元することもできます。これは、ドキュメントが変更されたときにコンテンツを HTML および JSON としてエクスポートするインタラクティブな例です。

## 書き出し

### オプション1：JSON

JSON はおそらく、たとえばメンションを探すためにループするのが簡単で、Tiptap が内部で使用するものに似ています。とにかく、JSON を使用してコンテンツを保存する場合は、コンテンツを JSON として取得するメソッドを提供します。

<!-- JSON is probably easier to loop through, for example to look for a mention and it’s more like what Tiptap uses under the hood. Anyway, if you want to use JSON to store the content we provide a method to retrieve the content as JSON: -->

```js
const json = editor.getJSON()
```

<!-- You can store that in your database (or send it to an API) and restore the document initially like that: -->

これをデータベースに保存して（またはAPIに送信して）、最初は次のようにドキュメントを復元できます。

```js
new Editor({
  content: {
    "type": "doc",
    "content": [
      // …
    ]
  },
})
```

<!-- Or if you need to wait for something, you can do it later through the editor instance: -->

または、何かを待つ必要がある場合は、後でエディターインスタンスを使用してそれを行うことができます。

```js
editor.commands.setContent({
  "type": "doc",
  "content": [
    // …
  ]
})
```

<!-- Here is an interactive example where you can see that in action: -->


https://embed.tiptap.dev/preview/GuideContent/ExportJSON?hideSource

### オプション2：HTML

HTML は、電子メールなどの他の場所で簡単にレンダリングでき、頻繁に使用されるため、ある時点でエディターを切り替える方がおそらく簡単です。とにかく、すべてのエディターインスタンスは、現在のドキュメントからHTMLを取得するためのメソッドを提供します。

<!-- HTML can be easily rendered in other places, for example in emails and it’s wildly used, so it’s probably easier to switch the editor at some point. Anyway, every editor instance provides a method to get HTML from the current document: -->

```js
const html = editor.getHTML()
```

<!-- This can then be used to restore the document initially: -->

これを使用して、最初にドキュメントを復元できます。

```js
new Editor({
  content: `<p>Example Text</p>`,
})
```

<!-- Or if you want to restore the content later (e. g. after an API call has finished), you can do that too: -->

または、後でコンテンツを復元する場合（たとえば、API呼び出しが終了した後）、それも実行できます。

```js
editor.commands.setContent(`<p>Example Text</p>`)
```

<!-- Use this interactive example to fiddle around: -->

このインタラクティブな例を使用して、いじくりまわします。

https://embed.tiptap.dev/preview/GuideContent/ExportHTML?hideSource

### オプション3：Y.js

私たちのエディターは Y.js を一流にサポートしており、[リアルタイムコラボレーション、オフライン編集、デバイス間の同期](/guide/collaborative-editing) などの機能を追加できます。

内部的には、Y.js はすべての変更の履歴を保存します。これは、ブラウザ、サーバー、接続されている他のクライアントとの同期、または USB スティックで行うことができます。ただし、Y.js にはこれらの保存された変更が必要であることを知っておくことが重要です。単純な JSON ドキュメントでは、変更をマージするのに十分ではありません。

もちろん、既存の JSON ドキュメントをインポートして開始し、Y.js から JSON を取得することはできますが、それはインポート/エクスポート形式に似ています。それはあなたの単一の情報源ではありません。上記のユースケースの1つに Y.js を追加する場合は、これを考慮することが重要です。

とは言うものの、それは素晴らしいことであり、私たちは素晴らしいバックエンドを提供しようとしています。

<!-- Our editor has top notch support for Y.js, which is amazing to add features like [realtime collaboration, offline editing, or syncing between devices](/guide/collaborative-editing). -->

<!-- Internally, Y.js stores a history of all changes. That can be in the browser, on a server, synced with other connected clients, or on a USB stick. But, it’s important to know that Y.js needs those stored changes. A simple JSON document is not enough to merge changes. -->

<!-- Sure, you can 
<!-- That said, it’s amazing and we’re about to provide an amazing backend, that makes all that a breeze. -->

### マークダウンはオプションではありません

残念ながら、**Tiptap は入力または出力形式として Markdown をサポートしていません。** サポートを追加することを検討しましたが、それを行わないことにした理由は次のとおりです。

* HTML と JSON はどちらも、深くネストされた構造を持つことができ、Markdown はフラットなため。
* Markdown の基準が異なるため。
* Tiptap の強みはカスタマイズですが、Markdown ではうまく機能しないため。
* HTML を Markdown に、またはその逆に変換するのに十分なパッケージがあるため。

HTML または JSON を使用してコンテンツを保存することを検討する必要があります。これらは、ほとんどのユースケースで完全に問題ありません。

それでもMarkdownが必要だと思われる場合は、ProseMirrorに[Markdownの処理方法の例](https://prosemirror.net/examples/markdown/)、[Nextcloud Text](https://github.com/nextcloud/text) はTiptap v1 を使用して Markdown を操作します。多分あなたはそれらから学ぶことができます。または、本当に優れた Markdown エディターをお探しの場合は、[CodeMirror](https://codemirror.net/) をお試しください。

そうは言っても、Tiptap はコンテンツをフォーマットするための[Markdownショートカット](/examples/markdown-shortcuts) をサポートしています。また、コンテンツを Markdown のように見せることもできます。たとえば、CSS で `<h1>` の前に `＃` を追加します。

<!-- Unfortunately, **tiptap doesn’t support Markdown as an input or output format**. We considered to add support for it, but those are the reasons why we decided to not do it: -->

<!-- * Both, HTML and JSON, can have deeply nested structures, Markdown is flat.
* Markdown standards vary.
* Tiptap’s strength is customization, that doesn’t work very well with Markdown.
* There are enough packages to convert HTML to Markdown and vice-versa. -->

<!-- You should really consider to work with HTML or JSON to store your content, they are perfectly fine for most use cases. -->

<!-- If you still think you need Markdown, ProseMirror has an [example on how to deal with Markdown](https://prosemirror.net/examples/markdown/), [Nextcloud Text](https://github.com/nextcloud/text) uses Tiptap 1 to work with Markdown. Maybe you can learn from them. Or if you are looking for a really good Markdown editor, try [CodeMirror](https://codemirror.net/). -->

<!-- That said, Tiptap does support [Markdown shortcuts](/examples/markdown-shortcuts) to format your content. Also you’re free to let your content look like Markdown, for example add a `#` before an `<h1>` with CSS. -->

## 変更箇所のリッスン

人々が書いている間、更新されたコンテンツを継続的に保存したい場合は、[イベントにフック](/api/events) することができます。 これがどのように見えるかの例です：

<!-- If you want to continuously store the updated content while people write, you can [hook into events](/api/events). Here is an example how that could look like: -->

```js
const editor = new Editor({
  // intial content
  content: `<p>Example Content</p>`,

  // triggered on every change
  onUpdate: ({ editor }) => {
    const json = editor.getJSON()
    // send the content to an API here
  },
})
```

## レンダリング

### オプション1：Tiptap の読み取り専用インスタンス

保存したコンテンツをレンダリングするには、エディターを読み取り専用に設定します。 これにより、CSS やその他のコードを複製することなく、エディターとまったく同じレンダリングを実現できます。

<!-- To render the saved content, set the editor to read-only. That’s how you can achieve the exact same rendering as it’s in the editor, without duplicating your CSS and other code. -->

https://embed.tiptap.dev/preview/GuideContent/ReadOnly

### オプション2：ProseMirror の JSON から HTML を生成する

サーバー側でコンテンツをレンダリングする必要がある場合、たとえば、Tiptap で記述されたブログ投稿の HTML を生成する場合は、実際のエディターインスタンスなしでそれを実行することをお勧めします。

それが `generateHTML()` の目的です。 これは、実際のエディターインスタンスなしで HTML をレンダリングするヘルパー関数です。

https://embed.tiptap.dev/preview/GuideContent/GenerateHTML

ちなみに、他の方法も可能です。 以下の例は、HTML から JSON を生成する方法を示しています。

<!-- If you need to render the content on the server side, for example to generate the HTML for a blog post which has been written in Tiptap, you’ll probably want to do just that without an actual editor instance. -->

<!-- That’s what the `generateHTML()` is for. It’s a helper function which renders HTML without an actual editor instance. -->

<!-- https://embed.tiptap.dev/preview/GuideContent/GenerateHTML -->

<!-- By the way, the other way is possible, too. The below examples shows how to generate JSON from HTML. -->

https://embed.tiptap.dev/preview/GuideContent/GenerateJSON

## マイグレーション

既存のコンテンツを Tiptap に移行する場合は、既存の出力を HTML に変換することをお勧めします。 ProseMirror は問題がないことを保証するため、これはおそらく最初のコンテンツを Tiptap に取り込むのに最適な形式です。（構成に基づいて）許可されていないタグや属性がある場合でも、Tiptap はそれらを静かに破棄します。

これを支援するために、いくつかのケースを検討します。たとえば、HTML を互換性のある JSON 構造に変換する PHP パッケージを提供します [ueberdosis/prosemirror-to-html](https://github.com/ueberdosis/html-to-prosemirror) 。

[あなたの経験を私たちと共有してください！](mailto:humans@tiptap.dev) ここにさらに情報を追加したいと思います。

<!-- If you’re migrating existing content to Tiptap we would recommend to get your existing output to HTML. That’s probably the best format to get your initial content into Tiptap, because ProseMirror ensures there is nothing wrong with it. Even if there are some tags or attributes that aren’t allowed (based on your configuration), Tiptap just throws them away quietly. -->

<!-- We’re about to go through a few cases to help with that, for example we provide a PHP package to convert HTML to a compatible JSON structure: [ueberdosis/prosemirror-to-html](https://github.com/ueberdosis/html-to-prosemirror). -->

<!-- [Share your experiences with us!](mailto:humans@tiptap.dev) We’d like to add more information here. -->

## セキュリティ

セキュリティ上の懸念から、どちらか一方を使用する理由はありません。誰かが悪意のあるコンテンツをサーバーに送信したい場合、それが JSON であるか HTML であるかは関係ありません。 Tiptap を使用しているかどうかは関係ありません。常にユーザー入力を検証する必要があります。

<!-- There is no reason to use one or the other because of security concerns. If someone wants to send malicious content to your server, it doesn’t matter if it’s JSON or HTML. It doesn’t even matter if you’re using Tiptap or not. You should always validate user input. -->



# アクセシビリティ

<!-- :::pro Fund the development ♥
We need your support to maintain, update, support and develop Tiptap. If you’re waiting for progress here, [become a sponsor and fund our work](/sponsor).
::: -->

> pro 開発資金♥
> Tiptap を維持、更新、サポート、開発するには、あなたのサポートが必要です。ここで進捗を待っている場合は、[スポンサーになり、私たちの仕事に資金を提供してください](/sponsor) 。


## はじめに

<!-- We strive to make Tiptap accessible to everyone, but to be honest, there’s not much work done now. From our current understanding, that’s what needs to be done: -->

Tiptap を誰もが利用できるように努めていますが、正直なところ、現在はあまり作業が行われていません。私たちの現在の理解から、それが行われる必要があることです。

## インターフェース

インターフェイスには、明確に定義されたコントラスト、十分な大きさのクリック領域、セマンティックマークアップが必要であり、キーボードでアクセス可能であり、十分に文書化されている必要があります。現在、インターフェースも提供していませんので、今のところそれは完全にあなた次第です。

ただし、心配はいりません。すぐにインターフェースを提供し、早い段階でアクセシビリティを考慮に入れます。

<!-- An interface needs to have well-defined contrasts, big enough click areas, semantic markup, must be keyboard accessible and well documented. Currently, we don’t even provide an interface, so for now that’s totally up to you. -->

<!-- But no worries, we’ll provide an interface soon and take accessibility into account early on. -->

## 出力

エディターはセマンティックマークアップを生成する必要があり、キーボードでアクセス可能であり、十分に文書化されている必要があります。 Tiptapのコンテンツは適切に構成されているため、すでに優れた基盤となっています。そうは言っても、サポートを追加して、画像のAlt属性などの追加の属性の使用を奨励することができます。

<!-- The editor needs to produce semantic markup, must be keyboard accessible and well documented. The Tiptap content is well structured so that’s a good foundation already. That said, we can add support and encourage the usage of additional attributes, for example the Alt-attribute for images. -->

### ライティング支援（オプション）

オプションのライティング支援は、たとえば見出しレベルの誤った使用法を指摘するなど、意味的に正しいコンテンツを書く人々を助けることができます。コア開発者が提供するこの種の支援により、多くのアプリケーションのコンテンツを改善するのに役立つ可能性があります。

<!-- An optional writing assitance could help people writing content semanticly correct, for example pointing out an incorrect usage of heading levels. With that kind of assistance provided by the core developers, we could help to improve the content of a lot of applications. -->

## 資力

|ドキュメント|セクション|見出し|
| -------- | ------- | -------------------------------------------------- ------------------------------------ |
| WCAG 3.0 | 7.1 | [代替テキスト](https://www.w3.org/TR/wcag-3.0/#text-alternatives)|
| WCAG 2.1 | 1.1.1 | [非テキストコンテンツ](https://www.w3.org/WAI/WCAG21/Understanding/non-text-content)|
| WCAG 2.1 | 2.1 | [キーボードアクセス可能](https://www.w3.org/WAI/WCAG21/Understanding/keyboard-accessible)|
| WCAG 2.1 | 2.1.1 | [キーボード](https://www.w3.org/WAI/WCAG21/Understanding/keyboard)|
| WCAG 2.1 | 4.1.1 | [解析](https://www.w3.org/WAI/WCAG21/Understanding/parsing)|
| WCAG 2.1 | 4.1.2 | [名前、役割、価値](https://www.w3.org/WAI/WCAG21/Understanding/name-role-value)|
| WCAG 2.1 | 2.1.2 | [キーボードトラップなし](https://www.w3.org/TR/WCAG21/#no-keyboard-trap)|

TODO：WCAG3.0を指すようにリソースを更新します https://www.w3.org/TR/wcag-3.0/

ここに追加する必要があるものはありますか？ [お知らせください](mailto:humans@tiptap.dev)、それを考慮に入れることができます。




# コラボ編集

## はじめに

<!-- Real-time collaboration, syncing between different devices and working offline used to be hard. We provide everything you need to keep everything in sync with the power of [Y.js](https://github.com/yjs/yjs). The following guide helps you get started with collaborative editing in Tiptap. Don’t worry, a production-grade setup doesn’t require much code. -->

リアルタイムのコラボレーション、異なるデバイス間の同期、オフラインでの作業は、以前は困難でした。 [Y.js](https://github.com/yjs/yjs) のパワーとすべてを同期させるために必要なすべてを提供します。次のガイドは、Tiptapでの共同編集を開始するのに役立ちます。心配しないでください。本番環境グレードのセットアップでは、多くのコードは必要ありません。

## ビデオコース

私たちは、Tiptap を使用した共同テキスト編集について知っておく必要のあるすべてを教えるビデオコースに取り組んでいます。最初のビデオは、スポンサーがここで利用できます。

<!-- We are working on a video course which teaches everything you need to know about collaborative text editing with Tiptap. The first video is available for sponsors here: -->

https://tiptap.dev/screencasts/collaborative-editing/make-tiptap-collaborative

## エディターを構成する

Tiptapが使用する基本的なスキーマは、ドキュメントを同期するための優れた基盤です。 [`Collaboration`](/api/extensions/collaboration) 拡張機能を使用すると、[Y.js](https://github.com/yjs/yjs) を使用してドキュメントへの変更を追跡するようにTiptapに指示できます。

Y.js は、競合のないレプリケートされたデータ型の実装です。つまり、変更をマージするのに非常に優れています。そしてそれを達成するために、変更を順番に行う必要はありません。オフライン中にドキュメントを変更し、デバイスが再びオンラインになったときに他の変更とマージすることはまったく問題ありません。

どういうわけか、すべてのクライアントは、ある時点でドキュメントの変更を交換する必要があります。そのための最も一般的なテクノロジーは、[WebRTC](https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API)  と[WebSockets](https://developer.mozilla.org/de/docs/Web/API/WebSocket) です。なので、それらを詳しく見てみましょう。


<!-- The underyling schema Tiptap uses is an excellent foundation to sync documents. With the [`Collaboration`](/api/extensions/collaboration) extension you can tell Tiptap to track changes to the document with [Y.js](https://github.com/yjs/yjs). -->

<!-- Y.js is a conflict-free replicated data types implementation, or in other words: It’s really good in merging changes. And to achieve that, changes don’t even have to come in order. It’s totally fine to change a document while being offline and merge it with other changes when the device is online again. -->

<!-- Somehow, all clients need to interchange document modifications at some point. The most popular technologies to do that are [WebRTC](https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API) and [WebSockets](https://developer.mozilla.org/de/docs/Web/API/WebSocket), so let’s have a closer look at those: -->

### WebRTC

WebRTC は、クライアントを相互に接続するためにのみサーバーを使用します。実際のデータは、サーバーがそれについて何も知らずにクライアント間を流れます。これは、協調編集の最初のステップを実行するのに最適です。

まず、依存関係をインストールします。

<!-- WebRTC uses a server only to connect clients with each other. The actual data is then flowing between the clients, without the server knowing anything about it and that’s great to take the first steps with collaborative editing. -->

<!-- First, install the dependencies: -->

```bash
npm install @tiptap/extension-collaboration yjs y-webrtc
```

<!-- Now, create a new Y document, and register it with Tiptap: -->

次に、新しい Y ドキュメントを作成し、Tiptap に登録します。

```js

// A new Y document
const ydoc = new Y.Doc()
// Registered with a WebRTC provider
const provider = new WebrtcProvider('example-document', ydoc)

const editor = new Editor({
  extensions: [
    StarterKit.configure({
      // The Collaboration extension comes with its own history handling
      history: false,
    }),
    // Register the document with Tiptap
    Collaboration.configure({
      document: ydoc,
    }),
  ],
})
```

<!-- This should be enough to create a collaborative instance of Tiptap. Crazy, isn’t it? Try it out, and open the editor in two different browsers. Changes should be synced between different windows. -->

<!-- So how does this magic work? All clients need to connect with eachother, that’s the job of a *provider*. The [WebRTC provider](https://github.com/yjs/y-webrtc) is the easiest way to get started with, as it uses a public server to connect clients directly with each other, but not to sync the actual changes. This has two downsides, though. -->

これは、Tiptap のコラボレーティブインスタンスを作成するのに十分なはずです。クレイジーですね。試してみて、2つの異なるブラウザでエディタを開きます。変更は、異なるウィンドウ間で同期する必要があります。

では、この魔法はどのように機能しますか？すべてのクライアントは互いに接続する必要があります。それが*プロバイダー*の仕事です。 [WebRTCプロバイダー](https://github.com/yjs/y-webrtc) は、パブリックサーバーを使用してクライアントを相互に直接接続しますが、実際の変更を同期しないため、開始するのに最も簡単な方法です。 。ただし、これには2つの欠点があります。

<!-- 1. Browsers refuse to connect with too many clients. With Y.js it’s enough if all clients are connected indirectly, but even that isn’t possible at some point. Or in other words, it doesn’t scale well for more than 100+ concurrent clients in the same document. -->
<!-- 2. It’s likely you want to involve a server to persist changes anyway. But the WebRTC signaling server (which connects all clients with eachother) doesn’t receive the changes and therefore doesn’t know what’s in the document. -->

1. ブラウザはあまりにも多くのクライアントとの接続を拒否します。 Y.js では、すべてのクライアントが間接的に接続されていれば十分ですが、それでもある時点では不可能です。つまり、同じドキュメント内の 100を超える同時クライアントに対しては適切に拡張できません。
2. とにかく変更を永続化するために、サーバーを関与させたいと思う可能性があります。ただし、WebRTC シグナリングサーバー（すべてのクライアントを相互に接続する）は変更を受信しないため、ドキュメントの内容を認識しません。

<!-- Anyway, if you want to dive deeper, head over to [the Y WebRTC repository](https://github.com/yjs/y-webrtc) on GitHub. -->

とにかく、さらに深く掘り下げたい場合は、GitHubの [Y WebRTCリポジトリ](https://github.com/yjs/y-webrtc) にアクセスしてください。

### WebSocket（推奨）

ほとんどのユースケースでは、WebSocket プロバイダーが推奨される選択です。非常に柔軟性があり、拡張性に優れています。さらに簡単にするために、Tiptap の公式バックエンドに取り組んでいます。バックエンドはまだ早期アクセス（スポンサーのみ）ですが、プロバイダーはすでに使用できます。

クライアントの場合、例はほぼ同じですが、プロバイダーのみが異なります。まず、依存関係をインストールしましょう。

<!-- For most uses cases, a WebSocket provider is the recommended choice. It’s very flexible and can scale very well. To make it even easier, we are working on an official backend for Tiptap. The backend is still in early access (sponsors-only), but you can use the provider already. -->

<!-- For the client, the example is nearly the same, only the provider is different. First, let’s install the dependencies: -->

```bash
npm install @tiptap/extension-collaboration @hocuspocus/provider
```

<!-- And then register the WebSocket provider with Tiptap: -->

次に、WebSocket プロバイダーを Tiptap に登録します。

```js

// Set up the Hocuspocus WebSocket provider
const provider = new HocuspocusProvider({
  url: 'ws://127.0.0.1:1234',
  name: 'example-document',
})

const editor = new Editor({
  extensions: [
    StarterKit.configure({
      // The Collaboration extension comes with its own history handling
      history: false,
    }),
    // Register the document with Tiptap
    Collaboration.configure({
      document: provider.document,
    }),
  ],
})
```

This example doesn’t work out of the box. As you can see, it’s configured to talk to a WebSocket server which is available under `ws://127.0.0.1:1234` (WebSocket protocol `ws://`, your local IP `127.0.0.1` and the port `1234`). You need to set this up, too.

この例は、そのままでは機能しません。ご覧のとおり、`ws://127.0.0.1:1234`（WebSocketプロトコル `ws://`、ローカルIP `127.0.0.1`、`1234` ポートで利用可能なWebSocketサーバーと通信するように構成されています）。これも設定する必要があります。

#### WebSocket バックエンド

サーバー部分をできるだけ簡単にするために、[Hocuspocusと呼ばれる意見のあるサーバーパッケージ](http://hocuspocus.dev/) を提供しています（現在、スポンサーとサブスクライバーのみが利用できます）。これは柔軟なNode.jsパッケージであり、カスタムバックエンドの構築に使用できます。

このガイドの目的のために、最小限のサーバーを文字通り数秒で起動するコマンドラインインターフェイスを使用してみましょう。

<!-- To make the server part as easy as possible, we provide [an opinionated server package, called Hocuspocus](http://hocuspocus.dev/) (currently available for sponsors and subscribers only). It’s a flexible Node.js package, that you can use to build your custom backend. -->

<!-- For the purpose of that guide, let’s just use the command-line interface which boots a minimal server literally in seconds: -->

```bash
npx @hocuspocus/cli --port 1234 --sqlite
```

<!-- This command downloads the Hocuspocus command-line interface, starts a server listening on port 1234 and stores changes in the memory (so it’s gone once you stop the command). The output should look like this: -->

このコマンドは、Hocuspocus コマンドラインインターフェイスをダウンロードし、ポート1234 でリッスンしているサーバーを起動し、変更をメモリに保存します（したがって、コマンドを停止すると、サーバーは削除されます）。出力は次のようになります。

```
Hocuspocus v1.0.0 running at:

> HTTP: http://127.0.0.1:1234
> WebSocket: ws://127.0.0.1:1234

Ready.
```

<!-- Try opening http://127.0.0.1:1234 in your browser. You should see a plain text `OK` if everything works fine. -->

<!-- Go back to your Tiptap editor and hit reload, it should now connect to the Hocuspocus WebSocket server and changes should sync with all other clients. Amazing, isn’t it? -->

ブラウザで http://127.0.0.1:1234 を開いてみてください。すべてが正常に機能する場合は、プレーンテキスト「OK」が表示されるはずです。

Tiptap エディターに戻り、リロードを押します。これで Hocuspocus WebSocket サーバーに接続され、変更が他のすべてのクライアントと同期されるはずです。すごいですね。

### 複数のネットワークプロバイダー

複数のプロバイダーを組み合わせることもできます。これは必須ではありませんが、1つの接続（WebSocketサーバーなど）がしばらくダウンした場合でも、クライアントの接続を維持できます。次に例を示します。

<!-- You can even combine multiple providers. That’s not needed, but could keep clients connected, even if one connection - for example the WebSocket server - goes down for a while. Here is an example: -->

```js
new WebrtcProvider('example-document', ydoc)
new HocuspocusProvider({
  url: 'ws://127.0.0.1:1234',
  name: 'example-document',
  document: ydoc,
})
```

<!-- Yes, that’s all. -->

<!-- Keep in mind that WebRTC needs a signaling server to connect clients. This signaling server doesn’t receive the synced data, but helps to let clients find each other. You can [run your own signaling server](https://github.com/yjs/y-webrtc#signaling), if you like. Otherwise it’s using a default URL baked into the package. -->

はい、それだけです。

WebRTC には、クライアントを接続するためのシグナリングサーバーが必要であることに注意してください。このシグナリングサーバーは同期されたデータを受信しませんが、クライアントがお互いを見つけられるようにするのに役立ちます。必要に応じて、[独自のシグナリングサーバーを実行する](https://github.com/yjs/y-webrtc#signaling) ことができます。それ以外の場合は、パッケージに組み込まれているデフォルトの URL を使用しています。

### 他のカーソルを表示する

ユーザーがカーソルとテキストの選択を相互に表示できるようにするには、[`CollaborationCursor`](/api/extensions/collaboration-cursor) 拡張機能を追加します。

<!-- To enable users to see the cursor and text selections of each other, add the [`CollaborationCursor`](/api/extensions/collaboration-cursor) extension. -->

```js

// Set up the Hocuspocus WebSocket provider
const provider = new HocuspocusProvider({
  url: 'ws://127.0.0.1:1234',
  name: 'example-document',
})

const editor = new Editor({
  extensions: [
    StarterKit.configure({
      // The Collaboration extension comes with its own history handling
      history: false,
    }),
    Collaboration.configure({
      document: provider.document,
    }),
    // Register the collaboration cursor extension
    CollaborationCursor.configure({
      provider: provider,
      user: {
        name: 'Cyndi Lauper',
        color: '#f783ac',
      },
    }),
  ],
})
```

<!-- As you can see, you can pass a name and color for every user. Look at the [collaborative editing example](/examples/collaborative-editing), to see a more advanced example. -->

ご覧のとおり、すべてのユーザーに名前と色を渡すことができます。 [コラボ編集の例](/examples/collaborative-editing) を見て、より高度な例を確認してください。

### オフラインサポート

素晴らしい[YIndexedDBアダプター](https://github.com/yjs/y-indexeddb) のおかげで、コラボレーションエディターにオフラインサポートを追加するのは基本的にワンライナーです。それをインストールします：

<!-- Adding offline support to your collaborative editor is basically a one-liner, thanks to the fantastic [Y IndexedDB adapter](https://github.com/yjs/y-indexeddb). Install it: -->

```bash
npm install y-indexeddb
```

<!-- And connect it with a Y document: -->

そしてそれを Y ドキュメントに接続します：

```js

const ydoc = new Y.Doc()

// Store the Y document in the browser
new IndexeddbPersistence('example-document', ydoc)

const editor = new Editor({
  extensions: [
    // …
    Collaboration.configure({
      document: ydoc,
    }),
  ],
})
```

<!-- All changes will be stored in the browser then, even if you close the tab, go offline, or make changes while working offline. Next time you are online, the WebSocket provider will try to find a connection and eventually sync the changes. -->

<!-- Yes, it’s magic. As already mentioned, that is all based on the fantastic Y.js framework. And if you’re using it, or our integration, you should definitely [sponsor Kevin Jahns on GitHub](https://github.com/dmonad), he is the brain behind Y.js. -->

タブを閉じたり、オフラインにしたり、オフラインで作業しているときに変更を加えたりしても、すべての変更はブラウザに保存されます。次回オンラインになると、WebSocket プロバイダーは接続を見つけようとし、最終的に変更を同期します。

はい、それは魔法です。すでに述べたように、それはすべて素晴らしい Y.js フレームワークに基づいています。そして、それを使用している場合、または私たちの統合を使用している場合は、間違いなく [GitHub の Kevin Jahns のスポンサー](https://github.com/dmonad) である必要があります。彼はY.jsの背後にある頭脳です。

## プラグアンドプレイコラボレーションバックエンド

コラボ編集バックエンドは、同期、承認、永続性、スケーリングを処理します。ここでは、いくつかの一般的な使用例を見ていきましょう。

> 警告早期アクセスをリクエストする
> プラグアンドプレイコラボレーションバックエンド hocuspocus はまだ進行中です。試してみたい場合は、[早期アクセスを取得](https://www.hocuspocus.dev) してください。
：：：

<!-- Our collaborative editing backend handles the syncing, authorization, persistence and scaling. Let’s go through a few common use cases here! -->

<!-- :::warning Request early access -->
<!-- Our plug & play collaboration backend hocuspocus is still work in progress. If you want to give it a try, [get early access](https://www.hocuspocus.dev). -->
:::

### ドキュメント名

ドキュメント名は、ここにあるすべての例で `'example-document'` ですが、任意の文字列にすることができます。実際のアプリでは、エンティティの名前とエンティティの ID を追加する可能性があります。これがどのように見えるかです。

<!-- The document name is `'example-document'` in all examples here, but it could be any string. In a real-world app you’d probably add the name of your entity and the ID of the entity. Here is how that could look like: -->

```js
const documentName = 'page.140'
```

バックエンドでは、文字列を分割して、ユーザーが ID 140 のページに入力していることを確認し、それに応じて認証などを管理できます。新しいドキュメントはその場で作成され、プロバイダーに文字列を渡す以外に、バックエンドにそれらについて通知する必要はありません。

また、複数のフィールドを 1つの Y.js ドキュメントと同期する場合は、コラボレーション拡張機能に異なるフラグメント名を渡すだけです。

<!-- In the backend, you can split the string to know the user is typing on a page with the ID 140 to manage authorization and such accordingly. New documents are created on the fly, no need to tell the backend about them, besides passing a string to the provider. -->

<!-- And if you would like to sync multiple fields with one Y.js document, just pass different fragment names to the collaboration extension: -->

```js
// a Tiptap instance for the field
Collaboration.configure({
  document: ydoc,
  field: 'title',
})

// and another instance for the summary, both in the same Y.js document
Collaboration.configure({
  document: ydoc,
  field: 'summary',
})
```

<!-- If your setup is somehow more complex, for example with nested fragments, you can pass a raw Y.js fragment too. `document` and `field` will be ignored then. -->

ネストされたフラグメントなど、セットアップがやや複雑な場合は、生の Y.js フラグメントを渡すこともできます。その場合、`document` と `field` は無視されます。


```js
// a raw Y.js fragment
Collaboration.configure({
  fragment: ydoc.getXmlFragment('custom'),
})
```

### 認証と承認

`onAuthenticate` フックを使用すると、クライアントが現在のドキュメントを表示するために認証および承認されているかどうかを確認できます。実際のアプリケーションでは、これはおそらく API、データベースクエリ、またはその他への要求になります。

エラーをスローする（または返された Promise を拒否する）と、クライアントへの接続は終了します。クライアントが承認および認証されている場合は、他のフックでアクセスできるコンテキストデータを返すこともできます。しかし、そうする必要はありません。

<!-- With the `onAuthenticate` hook you can check if a client is authenticated and authorized to view the current document. In a real world application this would probably be a request to an API, a database query or something else. -->

<!-- When throwing an error (or rejecting the returned Promise), the connection to the client will be terminated. If the client is authorized and authenticated you can also return contextual data which will be accessible in other hooks. But you don’t need to. -->

```js

const server = Server.configure({
  async onAuthenticate({ token }) {
    // Example test if a user is authenticated
    if (token !== 'super-secret-token') {
      throw new Error('Not authorized!')
    }

    // You can set contextual data to use it in other hooks
    return {
      user: {
        id: 1234,
        name: 'John',
      },
    }
  },
})

server.listen()
```

## 落とし穴

### スキーマの更新

Tiptap は [schema](/api/schema) に対して非常に厳密です。つまり、構成されたスキーマに従って許可されていないものを追加すると、破棄されます。スキーマが異なる複数のクライアントがドキュメントへの変更を共有する場合、これは奇妙な動作につながる可能性があります。

アプリにエディターを追加し、最初のユーザーがすでにそれを使用しているとします。それらには、すべてのデフォルト拡張機能を備えたTiptap のすべてのロードされたインスタンスがあり、そのため、それらのみを許可するスキーマがあります。ただし、次の更新でタスクリストを追加したいので、拡張機能を追加して再度デプロイします。

新しいユーザーがアプリを開き、更新されたスキーマ（タスクリストあり）を持っていますが、他のすべてのユーザーは古いスキーマ（タスクリストなし）を持っています。新しいユーザーは、新しく追加されたタスクリストをチェックアウトし、それをドキュメントに追加して、そのドキュメント内の他のユーザーにその機能を表示します。しかし、その後、彼女がそれを追加した直後にそれは魔法のように消えます。どうしたの？

1人のユーザーが新しいノード（またはマーク）を追加すると、その変更は接続されている他のすべてのクライアントに同期されます。接続されている他のクライアントは、これらの変更をエディターに適用します。Tiptap は、（古い）スキーマでは許可されていないため、そのまま厳密に、新しく追加されたノードを削除します。これらの変更は、接続されている他のクライアントやおっとに同期され、すべての場所で削除されます。これを回避するには、いくつかのオプションがあります。

1. スキーマを変更しないでください（クールではありません）。
2. 新しいスキーマをデプロイするときにクライアントを強制的に更新します（タフ）。
3. スキーマのバージョンを追跡し、古いスキーマを持つクライアントのエディターを無効にします（セットアップによって異なります）。

それを簡単にする機能を提供することは私たちのリストにあります。それを改善する方法がわかったら、それを私たちと共有してください！

<!-- tiptap is very strict with the [schema](/api/schema), that means, if you add something that’s not allowed according to the configured schema it’ll be thrown away. That can lead to a strange behaviour when multiple clients with different schemas share changes to a document. -->

<!-- Let’s say you added an editor to your app and the first people use it already. They have all a loaded instance of Tiptap with all default extensions, and therefor a schema that only allows those. But you want to add task lists in the next update, so you add the extension and deploy again. -->

<!-- A new user opens your app and has the updated schema (with task lists), while all others still have the old schema (without task lists). The new user checks out the newly added tasks lists and adds it to a document to show that feature to other users in that document. But then, it magically disappears right after she added it. What happened? -->

<!-- When one user adds a new node (or mark), that change will be synced to all other connected clients. The other connected clients apply those changes to the editor, and Tiptap, strict as it is, removes the newly added node, because it’s not allowed according to their (old) schema. Those changes will be synced to other connected clients and oops, it’s removed everywhere. To avoid this you have a few options: -->

<!-- 1. Never change the schema (not cool). -->
<!-- 2. Force clients to update when you deploy a new schema (tough). -->
<!-- 3. Keep track of the schema version and disable the editor for clients with an outdated schema (depends on your setup). -->

<!-- It’s on our list to provide features to make that easier. If you’ve got an idea how to improve that, share it with us! -->



# カスタム拡張

## はじめに

Tiptap の強みの1つは、その拡張性です。提供されている拡張機能に依存するのではなく、エディターを好みに合わせて拡張することを目的としています。

カスタム拡張機能を使用すると、既存のものに加えて、または最初から、新しいコンテンツタイプと新しい機能を追加できます。既存のノード、マーク、拡張機能を拡張する方法のいくつかの一般的な例から始めましょう。

最後に最初から始める方法を学びますが、既存の拡張機能を拡張したり、新しい拡張機能を作成したりするためにも同じ知識が必要です。

<!-- One of the strengths of Tiptap is its extendability. You don’t depend on the provided extensions, it is intended to extend the editor to your liking. -->

<!-- With custom extensions you can add new content types and new functionalities, on top of what already exists or from scratch. Let’s start with a few common examples of how you can extend existing nodes, marks and extensions. -->

<!-- You’ll learn how you start from scratch at the end, but you’ll need the same knowledge for extending existing and creating new extensions. -->

## 既存の拡張機能を拡張する

すべての拡張機能には `extend()` メソッドがあり、変更または追加したいすべてのものを含むオブジェクトを取得します。

たとえば、箇条書きのキーボードショートカットを変更したいとします。拡張機能のソースコード、その場合は [`BulletList`ノード](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bullet-list/src/bullet-list.ts) 。キーボードショートカットを上書きする特注の例の場合、コードは次のようになります。

<!-- Every extension has an `extend()` method, which takes an object with everything you want to change or add to it. -->

<!-- Let’s say, you’d like to change the keyboard shortcut for the bullet list. You should start with looking at the source code of the extension, in that case [the `BulletList` node](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bullet-list/src/bullet-list.ts). For the bespoken example to overwrite the keyboard shortcut, your code could look like that: -->

```js
// 1. Import the extension

// 2. Overwrite the keyboard shortcuts
const CustomBulletList = BulletList.extend({
  addKeyboardShortcuts() {
    return {
      'Mod-l': () => this.editor.commands.toggleBulletList(),
    }
  },
})

// 3. Add the custom extension to your editor
new Editor({
  extensions: [
    CustomBulletList(),
    // …
  ],
})
```

<!-- The same applies to every aspect of an existing extension, except to the name. Let’s look at all the things that you can change through the extend method. We focus on one aspect in every example, but you can combine all those examples and change multiple aspects in one `extend()` call too. -->

名前を除いて、同じことが既存の拡張機能のすべての側面に当てはまります。 extend メソッドで変更できるすべてのものを見てみましょう。すべての例で1つの側面に焦点を当てていますが、これらすべての例を組み合わせて、1つの `extend()` 呼び出しで複数の側面を変更することもできます。

### 名前

拡張子の名前は多くの場所で使用されており、変更するのは簡単ではありません。既存の拡張機能の名前を変更する場合は、拡張機能全体をコピーして、すべての場所で名前を変更できます。

拡張子名も JSON の一部です。 [コンテンツをJSONとして保存](/guide/output#option-1-json) する場合は、そこでも名前を変更する必要があります。

<!-- The extension name is used in a whole lot of places and changing it isn’t too easy. If you want to change the name of an existing extension, you can copy the whole extension and change the name in all occurrences. -->

<!-- The extension name is also part of the JSON. If you [store your content as JSON](/guide/output#option-1-json), you need to change the name there too. -->

### 優先順位

優先度は、内線番号が登録される順序を定義します。デフォルトの優先度は `100` で、これがほとんどの拡張機能にあります。優先度の高い拡張機能は、より早くロードされます。

<!-- The priority defines the order in which extensions are registered. The default priority is `100`, that’s what most extension have. Extensions with a higher priority will be loaded earlier. -->

```js

const CustomLink = Link.extend({
  priority: 1000,
})
```

<!-- The order in which extensions are loaded influences two things: -->

拡張機能が読み込まれる順序は、次の 2つのことに影響します。

1. #### プラグインの注文

   優先度の高い拡張機能の ProseMirror プラグインが最初に実行されます。

2. #### スキーマの順序

  たとえば、[`Link`](/api/marks/link) マークの優先度が高くなります。つまり、 `<strong><ahref="…">例</a></strong>`の代わりに、 `<ahref="…"><strong>例</strong></a>` としてレンダリングされます。。

<!-- 1. #### Plugin order -->
   <!-- ProseMirror plugins of extensions with a higher priority will run first. -->

<!-- 2. #### Schema order -->
   <!-- The [`Link`](/api/marks/link) mark for example has a higher priority, which means it will be rendered as `<a href="…"><strong>Example</strong></a>` instead of `<strong><a href="…">Example</a></strong>`. -->

### 設定

いずれにせよ、すべての設定は拡張機能を介して構成できますが、デフォルト設定を変更する場合、たとえば、他の開発者に Tiptap の上にライブラリを提供する場合は、次のように行うことができます。

<!-- All settings can be configured through the extension anyway, but if you want to change the default settings, for example to provide a library on top of Tiptap for other developers, you can do it like that: -->

```js

const CustomHeading = Heading.extend({
  addOptions() {
    return {
      ...this.parent?.(),
      levels: [1, 2, 3],
    }
  },
})
```

### ストレージ

ある時点で、拡張インスタンス内にデータを保存したいと思うかもしれません。このデータは変更可能です。`this.storage` の下の拡張機能内でアクセスできます。

<!-- At some point you probably want to save some data within your extension instance. This data is mutable. You can access it within the extension under `this.storage`. -->

```js

const CustomExtension = Extension.create({
  name: 'customExtension',

  addStorage() {
    return {
      awesomeness: 100,
    }
  },

  onUpdate() {
    this.storage.awesomeness += 1
  },
})
```

<!-- Outside the extension you have access via `editor.storage`. Make sure that each extension has a unique name. -->

拡張機能の外部では、`editor.storage` を介してアクセスできます。各拡張子に一意の名前が付いていることを確認してください。

```js
const editor = new Editor({
  extensions: [
    CustomExtension,
  ],
})

const awesomeness = editor.storage.customExtension.awesomeness
```

### スキーマ

Tiptap は、コンテンツの構造化、ネスト、動作などを構成する厳密なスキーマで機能します。既存の拡張機能については、[スキーマのすべての側面を変更できます](/api/schema) 。いくつかの一般的な使用例を見ていきましょう。

デフォルトの `Blockquote` 拡張機能は、見出しなどの他のノードをラップできます。ブロッククォートに段落のみを許可する場合は、それに応じて `content` 属性を設定します。

<!-- tiptap works with a strict schema, which configures how the content can be structured, nested, how it behaves and many more things. You [can change all aspects of the schema](/api/schema) for existing extensions. Let’s walk through a few common use cases. -->

<!-- The default `Blockquote` extension can wrap other nodes, like headings. If you want to allow nothing but paragraphs in your blockquotes, set the `content` attribute accordingly: -->

```js
// Blockquotes must only include paragraphs

const CustomBlockquote = Blockquote.extend({
  content: 'paragraph*',
})
```

<!-- The schema even allows to make your nodes draggable, that’s what the `draggable` option is for. It defaults to `false`, but you can override that. -->

スキーマでは、ノードをドラッグ可能にすることもできます。これが、`draggable` オプションの目的です。デフォルトは `false` ですが、これをオーバーライドできます。

```js
// Draggable paragraphs

const CustomParagraph = Paragraph.extend({
  draggable: true,
})
```

<!-- That’s just two tiny examples, but [the underlying ProseMirror schema](https://prosemirror.net/docs/ref/#model.SchemaSpec) is really powerful. -->

これはほんの2つの小さな例ですが、[基盤となる ProseMirror スキーマ](https://prosemirror.net/docs/ref/#model.SchemaSpec) は非常に強力です。

### 属性

属性を使用して、コンテンツに追加情報を格納できます。デフォルトの`Paragraph` ノードを拡張してさまざまな色にしたいとします。

<!-- You can use attributes to store additional information in the content. Let’s say you want to extend the default `Paragraph` node to have different colors: -->

```js
const CustomParagraph = Paragraph.extend({
  addAttributes() {
    // Return an object with attribute configuration
    return {
      color: {
        default: 'pink',
      },
    },
  },
})

// Result:
// <p color="pink">Example Text</p>
```

<!-- That is already enough to tell Tiptap about the new attribute, and set `'pink'` as the default value. All attributes will be rendered as a HTML attribute by default, and parsed from the content when initiated. -->

<!-- Let’s stick with the color example and assume you want to add an inline style to actually color the text. With the `renderHTML` function you can return HTML attributes which will be rendered in the output. -->

<!-- This examples adds a style HTML attribute based on the value of `color`: -->

これで、Tiptap に新しい属性を通知し、デフォルト値として「ピンク」を設定するのに十分です。すべての属性はデフォルトで HTML 属性としてレンダリングされ、開始時にコンテンツから解析されます。

色の例に固執し、実際にテキストに色を付けるためにインラインスタイルを追加するとします。`renderHTML` 関数を使用すると、出力でレンダリングされる HTML 属性を返すことができます。

この例では、`color` の値に基づいてスタイル HTML 属性を追加します。

```js
const CustomParagraph = Paragraph.extend({
  addAttributes() {
    return {
      color: {
        default: null,
        // Take the attribute values
        renderHTML: attributes => {
          // … and return an object with HTML attributes.
          return {
            style: `color: ${attributes.color}`,
          }
        },
      },
    }
  },
})

// Result:
// <p style="color: pink">Example Text</p>
```

<!-- You can also control how the attribute is parsed from the HTML. Maybe you want to store the color in an attribute called `data-color` (and not just `color`), here’s how you would do that: -->

HTML から属性を解析する方法を制御することもできます。色を `data-color` (`color`だけでなく) という属性に保存したい場合は、次のようにします。

```js
const CustomParagraph = Paragraph.extend({
  addAttributes() {
    return {
      color: {
        default: null,
        // Customize the HTML parsing (for example, to load the initial content)
        parseHTML: element => element.getAttribute('data-color'),
        // … and customize the HTML rendering.
        renderHTML: attributes => {
          return {
            'data-color': attributes.color,
            style: `color: ${attributes.color}`,
          }
        },
      },
    }
  },
})

// Result:
// <p data-color="pink" style="color: pink">Example Text</p>
```

<!-- You can completly disable the rendering of attributes with `rendered: false`. -->

`rendered: false`を使用して、属性のレンダリングを完全に無効にすることができます。

#### 既存の属性を拡張する

拡張機能に属性を追加して既存の属性を保持する場合は、`this.parent()` を介してそれらにアクセスできます。

未定義の場合もあるので、必ず確認するか、オプションのチェーンである `this.parent?.()` を使用してください。

<!-- If you want to add an attribute to an extension and keep existing attributes, you can access them through `this.parent()`. -->

<!-- In some cases, it is undefined, so make sure to check for that case, or use optional chaining `this.parent?.()` -->

```js
const CustomTableCell = TableCell.extend({
  addAttributes() {
    return {
      ...this.parent?.(),
      myCustomAttribute: {
        // …
      },
    }
  },
})
```

### グローバル属性

属性は、一度に複数の拡張機能に適用できます。これは、テキストの配置、行の高さ、色、フォントファミリ、およびその他のスタイル関連の属性に役立ちます。

[`TextAlign`](/api/extensions/text-align) の [完全なソースコード](https://github.com/ueberdosis/tiptap/tree/main/packages/extension-text-align) を詳しく見てください。 拡張機能を使用して、より複雑な例を確認してください。しかし、これが一言で言えばどのように機能するかです。

<!-- Attributes can be applied to multiple extensions at once. That’s useful for text alignment, line height, color, font family, and other styling related attributes. -->

<!-- Take a closer look at [the full source code](https://github.com/ueberdosis/tiptap/tree/main/packages/extension-text-align) of the [`TextAlign`](/api/extensions/text-align) extension to see a more complex example. But here is how it works in a nutshell: -->

```js

const TextAlign = Extension.create({
  addGlobalAttributes() {
    return [
      {
        // Extend the following extensions
        types: [
          'heading',
          'paragraph',
        ],
        // … with those attributes
        attributes: {
          textAlign: {
            default: 'left',
            renderHTML: attributes => ({
              style: `text-align: ${attributes.textAlign}`,
            }),
            parseHTML: element => element.style.textAlign || 'left',
          },
        },
      },
    ]
  },
})
```

### HTMLをレンダリングする

`renderHTML` 関数を使用すると、拡張機能を HTML にレンダリングする方法を制御できます。すべてのローカル属性、グローバル属性、および構成された CSS クラスを含む属性オブジェクトをオブジェクトに渡します。`Bold` 拡張機能の例を次に示します。

<!-- With the `renderHTML` function you can control how an extension is rendered to HTML. We pass an attributes object to it, with all local attributes, global attributes, and configured CSS classes. Here is an example from the `Bold` extension: -->

```js
renderHTML({ HTMLAttributes }) {
  return ['strong', HTMLAttributes, 0]
},
```

<!-- The first value in the array should be the name of HTML tag. If the second element is an object, it’s interpreted as a set of attributes. Any elements after that are rendered as children. -->

<!-- The number zero (representing a hole) is used to indicate where the content should be inserted. Let’s look at the rendering of the `CodeBlock` extension with two nested tags: -->

配列の最初の値は、HTML タグの名前である必要があります。 2番目の要素がオブジェクトの場合、属性のセットとして解釈されます。その後の要素はすべて子としてレンダリングされます。

数字のゼロ（穴を表す）は、コンテンツを挿入する場所を示すために使用されます。 2つのネストされたタグを使用した `CodeBlock` 拡張機能のレンダリングを見てみましょう。

```js
renderHTML({ HTMLAttributes }) {
  return ['pre', ['code', HTMLAttributes, 0]]
},
```

<!-- If you want to add some specific attributes there, 
そこに特定の属性を追加する場合は、`@tiptap/core` から `mergeAttributes` ヘルパーをインポートします。

```js

// ...

renderHTML({ HTMLAttributes }) {
  return ['a', mergeAttributes(HTMLAttributes, { rel: this.options.rel }), 0]
},
```

### HTMLを解析する

`parseHTML()` 関数は、HTML からエディタドキュメントを読み込もうとします。この関数は、パラメーターとして渡された HTML DOM 要素を取得し、属性とその値を持つオブジェクトを返すことが期待されています。 [`Bold`](/api/marks/bold) マークの簡単な例を次に示します。

<!-- The `parseHTML()` function tries to load the editor document from HTML. The function gets the HTML DOM element passed as a parameter, and is expected to return an object with attributes and their values. Here is a simplified example from the [`Bold`](/api/marks/bold) mark: -->

```js
parseHTML() {
  return [
    {
      tag: 'strong',
    },
  ]
},
```

<!-- This defines a rule to convert all `<strong>` tags to `Bold` marks. But you can get more advanced with this, here is the full example from the extension: -->

これは、すべての `<strong>` タグを `Bold` マークに変換するルールを定義します。ただし、これを使用するとさらに高度になります。拡張機能の完全な例を次に示します。

```js
parseHTML() {
  return [
    // <strong>
    {
      tag: 'strong',
    },
    // <b>
    {
      tag: 'b',
      getAttrs: node => node.style.fontWeight !== 'normal' && null,
    },
    // <span style="font-weight: bold"> and <span style="font-weight: 700">
    {
      style: 'font-weight',
      getAttrs: value => /^(bold(er)?|[5-9]\d{2,})$/.test(value as string) && null,
    },
  ]
},
```

<!-- This checks for `<strong>` and `<b>` tags, and any HTML tag with an inline style setting the `font-weight` to bold. -->

<!-- As you can see, you can optionally pass a `getAttrs` callback, to add more complex checks, for example for specific HTML attributes. The callback gets passed the HTML DOM node, except when checking for the `style` attribute, then it’s the value. -->

<!-- You are wondering what’s that `&& null` doing? [ProseMirror expects `null` or `undefined` if the check is successful.](https://prosemirror.net/docs/ref/version/0.18.0.html#model.ParseRule.getAttrs) -->

<!-- [Pass `priority` to a rule](https://prosemirror.net/docs/ref/version/0.18.0.html#model.ParseRule.priority) to resolve conflicts with other extensions, for example if you build a custom extension which looks for paragraphs with a class attribute, but you already use the default paragraph extension. -->

これにより、`<strong>` タグと `<b>` タグ、および `font-weight` を太字に設定するインラインスタイルの HTML タグがチェックされます。

ご覧のとおり、オプションで `getAttrs` コールバックを渡して、特定の HTML 属性などのより複雑なチェックを追加できます。コールバックは、`style` 属性をチェックする場合を除いて、HTML DOMノードに渡され、それが値になります。

その `&&null` は何をしているのか疑問に思っていますか？ [チェックが成功した場合、ProseMirror は null または undefined を予期します](https://prosemirror.net/docs/ref/version/0.18.0.html#model.ParseRule.getAttrs)

[ルールに priority を渡す](https://prosemirror.net/docs/ref/version/0.18.0.html#model.ParseRule.priority) 他の拡張機能との競合を解決するには、たとえば、カスタムを作成する場合クラス属性を持つ段落を検索する拡張機能ですが、すでにデフォルトの段落拡張機能を使用しています。

#### getAttrs の使用

この例でおそらく気付いた `getAttrs` 関数には、次の 2つの目的があります。

1. HTML属性をチェックして、ルールが一致するかどうかを判断します（そして、マークまたはノードがそのHTMLから作成されます）。関数が `false` を返す場合、それは一致していません。
2. DOM 要素を取得し、HTML 属性を使用して、それに応じてマークまたはノード属性を設定します。

<!-- The `getAttrs` function you’ve probably noticed in the example has two purposes: -->

<!-- 1. Check the HTML attributes to decide whether a rule matches (and a mark or node is created from that HTML). When the function returns `false`, it’s not matching. -->
<!-- 2. Get the DOM Element and use the HTML attributes to set your mark or node attributes accordingly: -->

```js
parseHTML() {
  return [
    {
      tag: 'span',
      getAttrs: element => {
        // Check if the element has an attribute
        element.hasAttribute('style')
        // Get an inline style
        element.style.color
        // Get a specific attribute
        element.getAttribute('data-color')
      },
    },
  ]
},
```

<!-- You can return an object with the attribute as the key and the parsed value to set your mark or node attribute. We would recommend to use the `parseHTML` inside `addAttributes()`, though. That will keep your code cleaner. -->

マークまたはノード属性を設定するために、キーとしての属性と解析された値を持つオブジェクトを返すことができます。ただし、 `addAttributes()` 内で `parseHTML` を使用することをお勧めします。これにより、コードがよりクリーンに保たれます。

```js
addAttributes() {
  return {
    color: {
      // Set the color attribute according to the value of the `data-color` attribute
      parseHTML: element => element.getAttribute('data-color'),
    }
  }
},
```

<!-- Read more about `getAttrs` and all other `ParseRule` properties in the [ProseMirror reference](https://prosemirror.net/docs/ref/#model.ParseRule). -->

[ProseMirrorリファレンス](https://prosemirror.net/docs/ref/#model.ParseRule) で、`getAttrs` およびその他すべての `ParseRule` プロパティの詳細をご覧ください。


### コマンド

```js

const CustomParagraph = Paragraph.extend({
  addCommands() {
    return {
      paragraph: () => ({ commands }) => {
        return commands.setNode('paragraph')
      },
    }
  },
})
```

<!-- :::warning Use the commands parameter inside of addCommands
To access other commands inside `addCommands` use the `commands` parameter that’s passed to it.
::: -->

> 警告 addCommands 内の commands パラメータを使用します
`addCommands` 内の他のコマンドにアクセスするには、渡された `commands` パラメータを使用します。

### キーボードショートカット

ほとんどのコア拡張機能には、適切なキーボードショートカットのデフォルトが付属しています。構築したいものによっては、変更したい場合もあります。`addKeyboardShortcuts()` メソッドを使用すると、事前定義されたショートカットマップを上書きできます。

<!-- Most core extensions come with sensible keyboard shortcut defaults. Depending on what you want to build, you’ll likely want to change them though. With the `addKeyboardShortcuts()` method you can overwrite the predefined shortcut map: -->

```js
// Change the bullet list keyboard shortcut

const CustomBulletList = BulletList.extend({
  addKeyboardShortcuts() {
    return {
      'Mod-l': () => this.editor.commands.toggleBulletList(),
    }
  },
})
```

### 入力ルール

入力ルールを使用すると、ユーザー入力をリッスンする正規表現を定義できます。これらは、マークダウンショートカットに使用されます。たとえば、`(c)` などのテキストを [`Typography`](/api/extends/typography) 拡張子を持つ `©` (およびその他多数) に変換するために使用されます。マークには `markInputRule` ヘルパー関数を使用し、ノードには `nodeInputRule` を使用します。

デフォルトでは、両側の2つのチルダの間のテキストは ~~打たれたテキスト~~ に変換されます。両側に1つのチルダで十分だと考えたい場合は、次のように入力ルールを上書きできます。

<!-- With input rules you can define regular expressions to listen for user inputs. They are used for markdown shortcuts, or for example to convert text like `(c)` to a `©` (and many more) with the [`Typography`](/api/extensions/typography) extension. Use the `markInputRule` helper function for marks, and the `nodeInputRule` for nodes. -->

<!-- By default text between two tildes on both sides is transformed to ~~striked text~~. If you want to think one tilde on each side is enough, you can overwrite the input rule like this: -->

```js
// Use the ~single tilde~ markdown shortcut

// Default:
// const inputRegex = /(?:^|\s)((?:~~)((?:[^~]+))(?:~~))$/

// New:
const inputRegex = /(?:^|\s)((?:~)((?:[^~]+))(?:~))$/

const CustomStrike = Strike.extend({
  addInputRules() {
    return [
      markInputRule({
        find: inputRegex,
        type: this.type,
      }),
    ]
  },
})
```

### ペースト ルール

貼り付けルールは、入力ルール（上記を参照）と同じように機能します。ただし、ユーザーが入力した内容を聞く代わりに、貼り付けられたコンテンツに適用されます。

正規表現には小さな違いが1つあります。入力ルールは通常、`$` ドル記号（「行末の位置をアサートする」を意味します）で終わり、貼り付けルールは通常、目を通します。すべてのコンテンツで、「$」ドル記号は表示されていません。

上記の例を使用して貼り付けルールに適用すると、次の例のようになります。

<!-- Paste rules work like input rules (see above) do. But instead of listening to what the user types, they are applied to pasted content. -->

<!-- There is one tiny difference in the regular expression. Input rules typically end with a `$` dollar sign (which means “asserts position at the end of a line”), paste rules typically look through all the content and don’t have said `$` dollar sign. -->

<!-- Taking the example from above and applying it to the paste rule would look like the following example. -->

```js
// Check pasted content for the ~single tilde~ markdown syntax

// Default:
// const pasteRegex = /(?:^|\s)((?:~~)((?:[^~]+))(?:~~))/g

// New:
const pasteRegex = /(?:^|\s)((?:~)((?:[^~]+))(?:~))/g

const CustomStrike = Strike.extend({
  addPasteRules() {
    return [
      markPasteRule({
        find: pasteRegex,
        type: this.type,
      }),
    ]
  },
})
```

### イベント

[イベントリスナー](/api/events) を別の拡張機能に移動することもできます。すべてのイベントのリスナーの例を次に示します。

<!-- You can even move your [event listeners](/api/events) to a separate extension. Here is an example with listeners for all events: -->

```js

const CustomExtension = Extension.create({
  onCreate() {
    // The editor is ready.
  },
  onUpdate() {
    // The content has changed.
  },
  onSelectionUpdate({ editor }) {
    // The selection has changed.
  },
  onTransaction({ transaction }) {
    // The editor state has changed.
  },
  onFocus({ event }) {
    // The editor is focused.
  },
  onBlur({ event }) {
    // The editor isn’t focused anymore.
  },
  onDestroy() {
    // The editor is being destroyed.
  },
})
```

### これで何が利用できますか？

これらの拡張機能はクラスではありませんが、拡張機能のどこでも「this」で利用できる重要なものがいくつかあります。

<!-- Those extensions aren’t classes, but you still have a few important things available in `this` everywhere in the extension. -->

```js
// Name of the extension, for example 'bulletList'
this.name

// Editor instance
this.editor

// ProseMirror type
this.type

// Object with all settings
this.options

// Everything that’s in the extended extension
this.parent
```

### ProseMirrorプラグイン（Advanced）

結局のところ、Tiptap は ProseMirror 上に構築されており、ProseMirror には非常に強力なプラグイン API もあります。これに直接アクセスするには、`addProseMirrorPlugins()` を使用します。

<!-- After all, Tiptap is built on ProseMirror and ProseMirror has a pretty powerful plugin API, too. To access that directly, use `addProseMirrorPlugins()`. -->

#### 既存のプラグイン

以下の例に示すように、既存の ProseMirror プラグインを Tiptap 拡張機能でラップできます。

<!-- You can wrap existing ProseMirror plugins in Tiptap extensions like shown in the example below. -->

```js

const History = Extension.create({
  addProseMirrorPlugins() {
    return [
      history(),
      // …
    ]
  },
})
```

#### ProseMirrorAPI にアクセス

クリック、ダブルクリック、コンテンツの貼り付けなどのイベントにフックするには、[エディター](/api/editor#editor-props) 上で `editorProps` に [イベントハンドラー](https://prosemirror.net/docs/ref/#view.EditorProps) を渡すことができます。

<!-- To hook into events, for example a click, double click or when content is pasted, you can pass [event handlers](https://prosemirror.net/docs/ref/#view.EditorProps) to `editorProps` on the [editor](/api/editor#editor-props). -->

<!-- Or you can add them to a Tiptap extension like shown in the below example. -->

または、以下の例に示すように、それらを Tiptap 拡張機能に追加することもできます。

```js

export const EventHandler = Extension.create({
  name: 'eventHandler',

  addProseMirrorPlugins() {
    return [
      new Plugin({
        key: new PluginKey('eventHandler'),
        props: {
          handleClick(view, pos, event) { /* … */ },
          handleDoubleClick(view, pos, event) { /* … */ },
          handlePaste(view, event, slice) { /* … */ },
          // … and many, many more.
          // Here is the full list: https://prosemirror.net/docs/ref/#view.EditorProps
        },
      }),
    ]
  },
})
```

### ノードビュー（Advanced）

たとえば、画像の周囲に洗練されたインターフェイスをレンダリングするために、ノード内で JavaScript を実行する必要がある高度なユースケースでは、ノードビューについて学習する必要があります。

それらは本当に強力ですが、複雑でもあります。簡単に言うと、親 DOM 要素と、コンテンツがレンダリングされる DOM 要素を返す必要があります。次の簡略化された例を見てください。

<!-- For advanced use cases, where you need to execute JavaScript inside your nodes, for example to render a sophisticated interface around an image, you need to learn about node views. -->

<!-- They are really powerful, but also complex. In a nutshell, you need to return a parent DOM element, and a DOM element where the content should be rendered in. Look at the following, simplified example: -->

```js

const CustomImage = Image.extend({
  addNodeView() {
    return () => {
      const container = document.createElement('div')

      container.addEventListener('click', event => {
        alert('clicked on the container')
      })

      const content = document.createElement('div')
      container.append(content)

      return {
        dom: container,
        contentDOM: content,
      }
    }
  },
})
```

<!-- There is a whole lot to learn about node views, so head over to the [dedicated section in our guide about node views](/guide/node-views) for more information. If you are looking for a real-world example, look at the source code of the [`TaskItem`](/api/nodes/task-item) node. This is using a node view to render the checkboxes. -->

ノードビューについて学ぶことはたくさんあるので、詳細については、[ノードビューに関するガイドの専用セクション](/guide/node-views) にアクセスしてください。実際の例を探している場合は、[`TaskItem`](/api/nodes/task-item) ノードのソースコードを確認してください。これは、ノードビューを使用してチェックボックスをレンダリングしています。

## 新しい拡張機能を作成

独自の拡張機能を最初から作成できますが、何を知っていますか？これは、上記の既存の拡張機能を拡張する場合と同じ構文です。

<!-- You can build your own extensions from scratch and you know what? It’s the same syntax as for extending existing extension described above. -->

### ノードを作成

ドキュメントをツリーと考えると、[ノード(nodes)](/api/nodes) はそのツリーのコンテンツの一種にすぎません。学ぶのに良い例は、[`Paragraph`](/api/nodes/paragraph)、[`Heading`](/api/nodes/heading)、または [`CodeBlock`](/api/nodes/code-block) です。

<!-- If you think of the document as a tree, then [nodes](/api/nodes) are just a type of content in that tree. Good examples to learn from are [`Paragraph`](/api/nodes/paragraph), [`Heading`](/api/nodes/heading), or [`CodeBlock`](/api/nodes/code-block). -->

```js

const CustomNode = Node.create({
  name: 'customNode',

  // Your code goes here.
})
```

<!-- Nodes don’t have to be blocks. They can also be rendered inline with the text, for example for [@mentions](/api/nodes/mention). -->

ノードはブロックである必要はありません。たとえば、テキストとインラインでレンダリングすることもできます。[@mentions](/api/nodes/mention)

### マークを作成

たとえば、インラインフォーマットを追加するために、1つまたは複数のマークを [nodes](/api/nodes) に適用できます。学ぶべき良い例は、[`Bold`](/api/marks/bold)、[`Italic`](/api/marks/italic) 、[`Highlight`](/api/marks/highlight) 

<!-- One or multiple marks can be applied to [nodes](/api/nodes), for example to add inline formatting. Good examples to learn from are [`Bold`](/api/marks/bold), [`Italic`](/api/marks/italic) and [`Highlight`](/api/marks/highlight). -->

```js

const CustomMark = Mark.create({
  name: 'customMark',

  // Your code goes here.
})
```

### 拡張機能を作成

拡張機能は Tiptap に新しい機能を追加し、ノードやマークの場合でも、ここで拡張機能という単語を頻繁に読みます。しかし、文字通りの拡張機能があります。これらはスキーマに追加できませんが（マークやノードのように）、機能を追加したり、エディターの動作を変更したりできます。

学ぶべき良い例はおそらく [`TextAlign`](/api/extensions/text-align) です。

<!-- Extensions add new capabilities to Tiptap and you’ll read the word extension here very often, even for nodes and marks. But there are literal extensions. Those can’t add to the schema (like marks and nodes do), but can add functionality or change the behaviour of the editor. -->

<!-- A good example to learn from is probably [`TextAlign`](/api/extensions/text-align). -->

```js

const CustomExtension = Extension.create({
  name: 'customExtension',

  // Your code goes here.
})
```

## 共有

すべてが正常に機能している場合は、[コミュニティと共有する](https://github.com/ueberdosis/tiptap/issues/819) ことを忘れないでください。

<!-- When everything is working fine, don’t forget to [share it with the community](https://github.com/ueberdosis/tiptap/issues/819). -->



# インタラクティブノードビュー

## はじめに

<!-- Node views are the best thing since sliced bread, at least if you are a fan of customization (and bread). With node views you can add interactive nodes to your editor. That can literally be everything. If you can write it in JavaScript, you can use it in your editor. -->

<!-- Node views are amazing to improve the in-editor experience, but can also be used in a read-only instance of Tiptap. They are unrelated to the HTML output by design, so you have full control about the in-editor experience *and* the output. -->

少なくともカスタマイズ（およびパン）が好きな場合は、スライスされたパン以来、ノードビューが最適です。ノードビューを使用すると、インタラクティブノードをエディターに追加できます。それは文字通りすべてである可能性があります。 JavaScript で記述できる場合は、エディターで使用できます。

ノードビューは、エディター内のエクスペリエンスを向上させるのに最適ですが、Tiptap の読み取り専用インスタンスでも使用できます。これらは設計上 HTML 出力とは無関係であるため、エディター内のエクスペリエンスと出力を完全に制御できます。

## さまざまなタイプのノードビュー

構築したいものに応じて、ノードビューの動作は少し異なり、特定の機能を検証することもできますが、落とし穴もあります。主な質問は、カスタムノードはどのように見えるべきかということです。

<!-- Depending on what you would like to build, node views work a little bit different and can have their verify specific capabilities, but also pitfalls. The main question is: How should your custom node look like? -->

### 編集可能なテキスト

ノードビューには、通常のノードと同じように編集可能なテキストを含めることができます。それは簡単です。カーソルは、通常のノードから期待するのとまったく同じように動作します。既存のコマンドは、これらのノードで非常にうまく機能します。

<!-- Yes, node views can have editable text, just like a regular node. That’s simple. The cursor will exactly behave like you would expect it from a regular node. Existing commands work very well with those nodes. -->

```html
<div class="Prosemirror" contenteditable="true">
  <p>text</p>
  <node-view>text</node-view>
  <p>text</p>
</div>
```

これが [`TaskItem`](/api/nodes/task-item) ノードの仕組みです。

### 編集不可能なテキスト

ノードには、編集できないテキストを含めることもできます。 カーソルはそれらにジャンプできませんが、とにかくそれは望ましくありません。

Tiptapは、デフォルトでそれらに `contenteditable="false"` を追加します。

<!-- Nodes can also have text, which is not editable. The cursor can’t jump into those, but you don’t want that anyway. -->

<!-- tiptap adds a `contenteditable="false"` to those by default. -->

```html
<div class="Prosemirror" contenteditable="true">
  <p>text</p>
  <node-view contenteditable="false">text</node-view>
  <p>text</p>
</div>
```

<!-- That’s how you could render mentions, which shouldn’t be editable. Users can add or delete them, but not delete single characters. -->

<!-- Statamic uses those for their Bard editor, which renders complex modules inside Tiptap, which can have their own text inputs. -->

これが、編集可能であってはならないメンションをレンダリングする方法です。 ユーザーはそれらを追加または削除できますが、単一の文字を削除することはできません。

Statamic は、Bard エディターにそれらを使用します。これは、独自のテキスト入力を持つことができる Tiptap 内の複雑なモジュールをレンダリングします。

### 混合コンテンツ

<!-- You can even mix non-editable and editable text. That’s great to build complex things, and still use marks like bold and italic inside the editable content. -->

<!-- **BUT**, if there are other elements with non-editable text in your node view, the cursor can jump there. You can improve that with manually adding `contenteditable="false"` to the specific parts of your node view. -->

編集不可能なテキストと編集可能なテキストを混在させることもできます。 これは、複雑なものを作成し、編集可能なコンテンツ内で太字や斜体などのマークを使用するのに最適です。

**しかし**、ノードビューに編集不可能なテキストを持つ他の要素がある場合、カーソルはそこにジャンプできます。 ノードビューの特定の部分に手動で `contenteditable=" false"` を追加することで、これを改善できます。

```html
<div class="Prosemirror" contenteditable="true">
  <p>text</p>
  <node-view>
    <div contenteditable="false">
      non-editable text
    </div>
    <div>
      editable text
    </div>
  </node-view>
  <p>text</p>
</div>
```

## マークアップ

<!-- But what happens if you [access the editor content](/guide/output)? If you’re working with HTML, you’ll need to tell Tiptap how your node should be serialized. -->

しかし、[エディターのコンテンツにアクセス](/guide/output) するとどうなりますか？ HTML を使用している場合は、ノードをシリアル化する方法を Tiptap に指示する必要があります。

<!-- The editor **does not** export the rendered JavaScript node, and for a lot of use cases you wouldn’t want that anyway. -->

エディターはレンダリングされた JavaScript ノードを **エクスポートしません** 。多くのユースケースでは、とにかくそれを望まないでしょう。

<!-- Let’s say you have a node view which lets users add a video player and configure the appearance (autoplay, controls …). You want the interface to do that in the editor, not in the output of the editor. The output of the editor should probably only have the video player. -->

ユーザーがビデオプレーヤーを追加し、外観（自動再生、コントロールなど）を構成できるノードビューがあるとします。 エディターの出力ではなく、エディターでインターフェースがそれを行うようにします。 エディターの出力には、おそらくビデオプレーヤーのみが含まれているはずです。

<!-- I know, I know, it’s not that easy. Just keep in mind, that you‘re in full control of the rendering inside the editor and of the output. -->

しかしながら、それはそれほど簡単ではありません。 エディター内のレンダリングと出力を完全に制御できることを覚えておいてください。

<!-- :::warning What if you store JSON?
That doesn’t apply to JSON. In JSON, everything is stored as an object. There is no need to configure the “translation” to and from HTML.
::: -->

> **警告 JSONを保存するとどうなりますか？**
これはJSONには適用されません。 JSONでは、すべてがオブジェクトとして保存されます。 HTMLとの間の「変換」を構成する必要はありません。

### HTMLをレンダリングする

さて、インタラクティブなノードビューでノードを設定しました。次に、出力を制御します。 ノードビューが非常に複雑な場合でも、レンダリングされる HTML は単純にすることができます。

<!-- Okay, you’ve set up your node with an interactive node view and now you want to control the output. Even if you’re node view is pretty complex, the rendered HTML can be simple: -->

```js
renderHTML({ HTMLAttributes }) {
  return ['my-custom-node', mergeAttributes(HTMLAttributes)]
},

// Output: <my-custom-node count="1"></my-custom-node>
```

<!-- Make sure it’s something distinguishable, so it’s easier to restore the content from the HTML. If you just need something generic markup like a `<div>` consider to add a `data-type="my-custom-node"`. -->

HTML からコンテンツを復元するのが簡単になるように、区別できるものであることを確認してください。`<div>` のような一般的なマークアップが必要な場合は、`data-type="my-custom-node"` を追加することを検討してください。

### HTMLを解析する

同じことがコンテンツの復元にも当てはまります。 期待するマークアップを構成できます。これは、ノードビューのマークアップとはまったく関係がない場合があります。 復元したいすべての情報が含まれている必要があります。

[`addAttributes`](/guide/custom-extensions#attributes) を使用して登録した場合、属性は自動的に復元されます。

<!-- The same applies to restoring the content. You can configure what markup you expect, that can be something completely unrelated to the node view markup. It just needs to contain all the information you want to restore. -->

<!-- Attributes are automagically restored, if you registered them through [`addAttributes`](/guide/custom-extensions#attributes). -->

```js
// Input: <my-custom-node count="1"></my-custom-node>

parseHTML() {
  return [{
    tag: 'my-custom-node',
  }]
},
```

### JavaScript/Vue/Reactをレンダリングする

しかし、実際の JavaScript / Vue / React コードをレンダリングしたい場合はどうでしょうか。 Tiptap を使用して出力をレンダリングすることを検討してください。 エディターを `editable:false` に設定するだけで、エディターを使用してコンテンツをレンダリングしていることに誰も気付かないでしょう。 :-)

<!-- But what if you want to render your actual JavaScript/Vue/React code? Consider using Tiptap to render your output. Just set the editor to `editable: false` and no one will notice you’re using an editor to render the content. :-) -->

<!-- ## Reference

### dom: ?⁠dom.Node
> The outer DOM node that represents the document node. When not given, the default strategy is used to create a DOM node.

### contentDOM: ?⁠dom.Node
> The DOM node that should hold the node's content. Only meaningful if the node view also defines a dom property and if its node type is not a leaf node type. When this is present, ProseMirror will take care of rendering the node's children into it. When it is not present, the node view itself is responsible for rendering (or deciding not to render) its child nodes.

### update: ?⁠fn(node: Node, decorations: [Decoration]) → bool
> When given, this will be called when the view is updating itself. It will be given a node (possibly of a different type), and an array of active decorations (which are automatically drawn, and the node view may ignore if it isn't interested in them), and should return true if it was able to update to that node, and false otherwise. If the node view has a contentDOM property (or no dom property), updating its child nodes will be handled by ProseMirror.

### selectNode: ?⁠fn()
> Can be used to override the way the node's selected status (as a node selection) is displayed.

### deselectNode: ?⁠fn()
> When defining a selectNode method, you should also provide a deselectNode method to remove the effect again.

### setSelection: ?⁠fn(anchor: number, head: number, root: dom.Document)
> This will be called to handle setting the selection inside the node. The anchor and head positions are relative to the start of the node. By default, a DOM selection will be created between the DOM positions corresponding to those positions, but if you override it you can do something else.

### stopEvent: ?⁠fn(event: dom.Event) → bool
> Can be used to prevent the editor view from trying to handle some or all DOM events that bubble up from the node view. Events for which this returns true are not handled by the editor.

### ignoreMutation: ?⁠fn(dom.MutationRecord) → bool
> Called when a DOM mutation or a selection change happens within the view. When the change is a selection change, the record will have a type property of "selection" (which doesn't occur for native mutation records). Return false if the editor should re-read the selection or re-parse the range around the mutation, true if it can safely be ignored.

### destroy: ?⁠fn()
> Called when the node view is removed from the editor or the whole editor is destroyed. -->



# JavaScript を使用したノードビュー

## はじめに

<!-- Using frameworks like Vue or React can feel too complex, if you’re used to work without those two. Good news: You can use Vanilla JavaScript in your node views. There is just a little bit you need to know, but let’s go through this one by one. -->

Vue や React のようなフレームワークを使用することは、これら 2つなしで作業することに慣れている場合、複雑すぎると感じる可能性があります。朗報：ノードビューで Vanilla JavaScript を使用できます。知っておくべきことが少しありますが、これを1つずつ見ていきましょう。


## JavaScript を使用してノードビューのレンダリング

<!-- Here is what you need to do to render a node view inside your editor: -->

エディター内でノードビューをレンダリングするために必要なことは次のとおりです。

<!-- 1. [Create a node extension](/guide/custom-extensions)
2. Register a new node view with `addNodeView()`
3. Write your render function
4. [Configure Tiptap to use your new node extension](/guide/configuration) -->

1. [ノード拡張を作成する](/guide/custom-extensions)
2.新しいノードビューを `addNodeView()` に登録します
3.レンダリング関数を記述します
4. [新しいノード拡張を使用するように Tiptap を構成する](/guide/configuration)

ノード拡張は次のようになります。

<!-- This is how your node extension could look like: -->

```js

export default Node.create({
  // configuration …

  addNodeView() {
    return ({ editor, node, getPos, HTMLAttributes, decorations, extension }) => {
      const dom = document.createElement('div')

      dom.innerHTML = 'Hello, I’m a node view!'

      return {
        dom,
      }
    }
  },
})
```

<!-- Got it? Let’s see it in action. Feel free to copy the below example to get started. -->

実際の動作を見てみましょう。開始するには、以下の例をコピーしてください。

https://embed.tiptap.dev/preview/GuideNodeViews/JavaScript

That node view even interacts with the editor. Time to see how that is wired up.

そのノードビューは、エディターとさえ相互作用します。それがどのように配線されているかを見てみましょう。

## アクセスノードの属性

エディターは、いくつかの役立つものをレンダリング関数に渡します。それらの1つは `node` プロップです。これにより、ノードビューでノード属性にアクセスできます。ノード拡張機能に `count` という名前の[属性を追加](/guide/custom-extensions#attributes) したとします。次のように属性にアクセスできます。

<!-- The editor passes a few helpful things to your render function. One of them is the `node` prop. This one enables you to access node attributes in your node view. Let’s say you have [added an attribute](/guide/custom-extensions#attributes) named `count` to your node extension. You could access the attribute like this: -->

```js
addNodeView() {
  return ({ node }) => {
    console.log(node.attrs.count)

    // …
  }
}
```


## ノード属性の更新

レンダリング関数に渡された `getPos` プロップを使用して、ノードビューからノード属性を更新することもできます。更新された属性のオブジェクトを使用して、新しいトランザクションをディスパッチします。

<!-- You can even update node attributes from your node view, with the help of the `getPos` prop passed to your render function. Dispatch a new transaction with an object of the updated attributes: -->

```js
addNodeView() {
  return ({ editor, node, getPos }) => {
    const { view } = editor

    // Create a button …
    const button = document.createElement('button')
    button.innerHTML = `This button has been clicked ${node.attrs.count} times.`

    // … and when it’s clicked …
    button.addEventListener('click', () => {
      if (typeof getPos === 'function') {
        // … dispatch a transaction, for the current position in the document …
        view.dispatch(view.state.tr.setNodeMarkup(getPos(), undefined, {
          count: node.attrs.count + 1,
        }))

        // … and set the focus back to the editor.
        editor.commands.focus()
      }
    })

    // …
  }
}
```

<!-- Does seem a little bit too complex? Consider using [React](/guide/node-views/react) or [Vue](/guide/node-views/vue), if you have one of those in your project anyway. It get’s a little bit easier with those two. -->

少し複雑すぎるように見えますか？とにかくプロジェクトにこれらのいずれかがある場合は、[React](/guide/node-views/react) または、[Vue](/guide/node-views/vue) の使用を検討してください。この 2つを使用すると、少し簡単になります。

## 編集可能なコンテンツの追加

編集可能なコンテンツをノードビューに追加するには、コンテンツのコンテナ要素である `contentDOM` を渡す必要があります。編集不可および編集可能なテキストコンテンツを含むノードビューの簡略化されたバージョンを次に示します。

<!-- To add editable content to your node view, you need to pass a `contentDOM`, a container element for the content. Here is a simplified version of a node view with non-editable and editable text content: -->

```js
// Create a container for the node view
const dom = document.createElement('div')

// Give other elements containing text `contentEditable = false`
const label = document.createElement('span')
label.innerHTML = 'Node view'
label.contentEditable = false

// Create a container for the content
const content = document.createElement('div')

// Append all elements to the node view container
dom.append(label, content)

return {
  // Pass the node view container …
  dom,
  // … and the content container:
  contentDOM: content,
}
```

<!-- Got it? You’re free to do anything you like, as long as you return a container for the node view and another one for the content. Here is the above example in action: -->

<!-- https://embed.tiptap.dev/preview/GuideNodeViews/JavaScriptContent -->

<!-- Keep in mind that this content is rendered by Tiptap. That means you need to tell what kind of content is allowed, for example with `content: 'inline*'` in your node extension (that’s what we use in the above example). -->

ノードビュー用のコンテナとコンテンツ用のコンテナを返す限り、好きなことを自由に行うことができます。上記の実際の例は次のとおりです。

https://embed.tiptap.dev/preview/GuideNodeViews/JavaScriptContent

このコンテンツは Tiptap によってレンダリングされることに注意してください。つまり、許可されているコンテンツの種類を指定する必要があります。たとえば、ノード拡張に `content: 'inline*'` を使用します（上記の例ではこれを使用しています）。



# React を使用したノードビュー

## はじめに

<!-- Using Vanilla JavaScript can feel complex if you are used to work in React. Good news: You can use regular React components in your node views, too. There is just a little bit you need to know, but let’s go through this one by one. -->

React での作業に慣れている場合、Vanilla JavaScript の使用は複雑に感じる可能性があります。朗報：ノードビューで通常の React コンポーネントを使用することもできます。知っておくべきことが少しありますが、これを 1つずつ見ていきましょう。

## React コンポーネントのレンダリング

エディター内で React コンポーネントをレンダリングするために必要なことは次のとおりです。

<!-- Here is what you need to do to render React components inside your editor: -->

<!-- 1. [Create a node extension](/guide/custom-extensions)
2. Create a React component
3. Pass that component to the provided `ReactNodeViewRenderer`
4. Register it with `addNodeView()`
5. [Configure Tiptap to use your new node extension](/guide/configuration) -->

1. [ノード拡張を作成する](/guide/custom-extensions)
2. React コンポーネントを作成します
3. そのコンポーネントを提供された `ReactNodeViewRenderer` に渡します
4. `addNodeView()` に登録します
5. [新しいノード拡張を使用するように Tiptap を構成する](/guide/configuration)

ノード拡張は次のようになります。

<!-- This is how your node extension could look like: -->

```js

export default Node.create({
  // configuration …

  addNodeView() {
    return ReactNodeViewRenderer(Component)
  },
})
```

<!-- There is a little bit of magic required to make this work. But don’t worry, we provide a wrapper component you can use to get started easily. Don’t forget to add it to your custom React component, like shown below: -->

この作業を行うには、少し魔法が必要です。ただし、心配しないでください。簡単に開始するために使用できるラッパーコンポーネントが用意されています。以下に示すように、カスタム React コンポーネントに追加することを忘れないでください。

```html
<NodeViewWrapper className="react-component">
  React Component
</NodeViewWrapper>
```

<!-- Got it? Let’s see it in action. Feel free to copy the below example to get started. -->

https://embed.tiptap.dev/preview/GuideNodeViews/ReactComponent

<!-- That component doesn’t interact with the editor, though. Time to wire it up. -->

実際の動作を見てみましょう。開始するには、以下の例をコピーしてください。

https://embed.tiptap.dev/preview/GuideNodeViews/ReactComponent

ただし、そのコンポーネントはエディタと相互作用しません。それを配線する時間。

## アクセスノードの属性

ノード拡張で使用する`ReactNodeViewRenderer` は、いくつかの非常に役立つ小道具を​​カスタム React コンポーネントに渡します。それらの1つは `node` プロップです。ノード拡張機能に `count` という名前の [属性を追加](/guide/custom-extensions#attributes) したとします（上記の例で行ったように）。次のようにアクセスできます。

<!-- The `ReactNodeViewRenderer` which you use in your node extension, passes a few very helpful props to your custom React component. One of them is the `node` prop. Let’s say you have [added an attribute](/guide/custom-extensions#attributes) named `count` to your node extension (like we did in the above example) you could access it like this: -->

```js
props.node.attrs.count
```

## ノード属性を更新する

コンポーネントに渡された `updateAttributes` プロップを使用して、ノードからノード属性を更新することもできます。更新された属性を持つオブジェクトを `updateAttributes` プロパティに渡します。

<!-- You can even update node attributes from your node, with the help of the `updateAttributes` prop passed to your component. Pass an object with updated attributes to the `updateAttributes` prop: -->

```js
export default props => {
  const increase = () => {
    props.updateAttributes({
      count: props.node.attrs.count + 1,
    })
  }

  // …
}
```

<!-- And yes, all of that is reactive, too. A pretty seemless communication, isn’t it? -->

そして、はい、それもすべて反応的です。かなり見苦しいコミュニケーションですね。

## 編集可能なコンテンツの追加

ノードビューに編集可能なコンテンツを追加するのに役立つ `NodeViewContent` と呼ばれる別のコンポーネントがあります。次に例を示します。

<!-- There is another component called `NodeViewContent` which helps you adding editable content to your node view. Here is an example: -->

```jsx

export default () => {
  return (
    <NodeViewWrapper className="react-component-with-content">
      <span className="label" contentEditable={false}>React Component</span>

      <NodeViewContent className="content" />
    </NodeViewWrapper>
  )
}
```

<!-- You don’t need to add those `className` attributes, feel free to remove them or pass other class names. Try it out in the following example: -->

<!-- https://embed.tiptap.dev/preview/GuideNodeViews/ReactComponentContent -->

<!-- Keep in mind that this content is rendered by Tiptap. That means you need to tell what kind of content is allowed, for example with `content: 'inline*'` in your node extension (that’s what we use in the above example). -->

<!-- The `NodeViewWrapper` and `NodeViewContent` components render a `<div>` HTML tag (`<span>` for inline nodes), but you can change that. For example `<NodeViewContent as="p">` should render a paragraph. One limitation though: That tag must not change during runtime. -->

これらの `className` 属性を追加する必要はありません。自由に削除するか、他のクラス名を渡してください。次の例で試してみてください。

https://embed.tiptap.dev/preview/GuideNodeViews/ReactComponentContent

このコンテンツは Tiptap によってレンダリングされることに注意してください。つまり、許可されているコンテンツの種類を指定する必要があります。たとえば、ノード拡張に `content: 'inline *'` を使用します（上記の例ではこれを使用しています）。

`NodeViewWrapper` および `NodeViewContent` コンポーネントは `<div>` HTML タグ（インラインノードの場合は `<span>`）をレンダリングしますが、これは変更できます。たとえば、 `<NodeViewContent as="p">` は段落をレンダリングする必要があります。ただし、1つの制限：そのタグは実行時に変更してはなりません。

## 利用可能なすべてのプロップ

これがあなたが期待できるプロップの完全なリストです：

<!-- Here is the full list of what props you can expect: -->

### editor

<!-- The editor instance -->

エディターインスタンス

### node

<!-- The current node -->

現在のノード

### decorations

<!-- An array of decorations -->

装飾の配列

### selected

<!-- `true` when there is a `NodeSelection` at the current node view -->

現在のノードビューに `NodeSelection` がある場合は `true`

### extension

<!-- Access to the node extension, for example to get options -->

たとえばオプションを取得するためのノード拡張へのアクセス

### getPos()

<!-- Get the document position of the current node -->

現在のノードのドキュメント位置を取得します

### updateAttributes()

<!-- Update attributes of the current node -->

現在のノードの属性を更新します

### deleteNode()

<!-- Delete the current node -->

現在のノードを削除します

## Dragging

<!-- To make your node views draggable, set `draggable: true` in the extension and add `data-drag-handle` to the DOM element that should function as the drag handle. -->

ノードビューをドラッグ可能にするには、拡張機能で「draggable: true」を設定し、ドラッグハンドルとして機能する DOM 要素に「data-drag-handle」を追加します。

https://embed.tiptap.dev/preview/GuideNodeViews/DragHandle



# Node views with Vue

## はじめに

<!-- Using Vanilla JavaScript can feel complex if you are used to work in Vue. Good news: You can use regular Vue components in your node views, too. There is just a little bit you need to know, but let’s go through this one by one. -->

Vue での作業に慣れている場合、Vanilla JavaScript の使用は複雑に感じる可能性があります。 朗報：ノードビューで通常の Vue コンポーネントを使用することもできます。 知っておくべきことが少しありますが、これを1つずつ見ていきましょう。

## Vue コンポーネントをレンダリング

<!-- Here is what you need to do to render Vue components inside your editor: -->

エディター内で Vue コンポーネントをレンダリングするために必要なことは次のとおりです。

<!-- 1. [Create a node extension](/guide/custom-extensions)
2. Create a Vue component
3. Pass that component to the provided `VueNodeViewRenderer`
4. Register it with `addNodeView()`
5. [Configure Tiptap to use your new node extension](/guide/configuration) -->

1. [ノード拡張を作成する](/guide/custom-extensions)
2. Vue コンポーネントを作成します
3. そのコンポーネントを提供された `VueNodeViewRenderer` に渡します
4. `addNodeView()` に登録します
5. [新しいノード拡張を使用するように Tiptap を構成する](/guide/configuration)

ノード拡張は次のようになります。

<!-- This is how your node extension could look like: -->

```js

export default Node.create({
  // configuration …

  addNodeView() {
    return VueNodeViewRenderer(Component)
  },
})
```

<!-- There is a little bit of magic required to make this work. But don’t worry, we provide a wrapper component you can use to get started easily. Don’t forget to add it to your custom Vue component, like shown below: -->

この作業を行うには、少し魔法が必要です。 ただし、心配しないでください。簡単に開始するために使用できるラッパーコンポーネントが用意されています。 以下に示すように、カスタムVueコンポーネントに追加することを忘れないでください。

```html
<template>
  <node-view-wrapper>
    Vue Component
  </node-view-wrapper>
</template>
```

<!-- Got it? Let’s see it in action. Feel free to copy the below example to get started. -->

次に実際の動作を見てみましょう。 開始するには、以下の例をコピーしてください。

https://embed.tiptap.dev/preview/GuideNodeViews/VueComponent

<!-- That component doesn’t interact with the editor, though. Time to wire it up. -->

ただし、そのコンポーネントはエディタと相互作用しません。 それを配線する時間。

## アクセスノードの属性

<!-- The `VueNodeViewRenderer` which you use in your node extension, passes a few very helpful props to your custom Vue component. One of them is the `node` prop. Add this snippet to your Vue component to directly access the node: -->

ノード拡張で使用する`VueNodeViewRenderer` は、いくつかの非常に役立つ小道具をカスタムVueコンポーネントに渡します。 それらの1つは `node` プロップです。 このスニペットを Vue コンポーネントに追加して、ノードに直接アクセスします。

```js
props: {
  node: {
    type: Object,
    required: true,
  },
},
```

<!-- That enables you to access node attributes in your Vue component. Let’s say you have [added an attribute](/guide/custom-extensions#attributes) named `count` to your node extension (like we did in the above example) you could access it like this: -->

これにより、Vue コンポーネントのノード属性にアクセスできます。ノード拡張機能に `count` という名前の[属性を追加](/guide/custom-extensions#attributes) したとします（上記の例で行ったように）。次のようにアクセスできます。

```js
this.node.attrs.count
```

## ノード属性を更新する

コンポーネントに渡された `updateAttributes` プロップを使用して、ノードからノード属性を更新することもできます。このスニペットをコンポーネントに追加するだけです。

<!-- You can even update node attributes from your node, with the help of the `updateAttributes` prop passed to your component. Just add this snippet to your component: -->

```js
props: {
  updateAttributes: {
    type: Function,
    required: true,
  },
},
```

<!-- Pass an object with updated attributes to the function: -->

更新された属性を持つオブジェクトを関数に渡します。

```js
this.updateAttributes({
  count: this.node.attrs.count + 1,
})
```

<!-- And yes, all of that is reactive, too. A pretty seemless communication, isn’t it? -->

そして、はい、それもすべて反応的です。かなり見苦しいコミュニケーションですね。

## 編集可能なコンテンツを追加する

ノードビューに編集可能なコンテンツを追加するのに役立つ `NodeViewContent` と呼ばれる別のコンポーネントがあります。次に例を示します。

<!-- There is another component called `NodeViewContent` which helps you adding editable content to your node view. Here is an example: -->

```html
<template>
  <node-view-wrapper class="dom">
    <node-view-content class="content-dom" />
  </node-view-wrapper>
</template>

<script>

export default {
  components: {
    NodeViewWrapper,
    NodeViewContent,
  },
}
</script>
```

<!-- You don’t need to add those `class` attributes, feel free to remove them or pass other class names. Try it out in the following example: -->

これらの `class` 属性を追加したり、削除したり、他のクラス名を渡したりする必要はありません。次の例で試してみてください。

https://embed.tiptap.dev/preview/GuideNodeViews/VueComponentContent

<!-- Keep in mind that this content is rendered by Tiptap. That means you need to tell what kind of content is allowed, for example with `content: 'inline*'` in your node extension (that’s what we use in the above example). -->

このコンテンツはTiptapによってレンダリングされることに注意してください。つまり、許可されているコンテンツの種類を指定する必要があります。たとえば、ノード拡張に `content: 'inline *'` を使用します（上記の例ではこれを使用しています）。

<!-- The `NodeViewWrapper` and `NodeViewContent` components render a `<div>` HTML tag (`<span>` for inline nodes), but you can change that. For example `<node-view-content as="p">` should render a paragraph. One limitation though: That tag must not change during runtime. -->

`NodeViewWrapper` および `NodeViewContent` コンポーネントは `<div>` HTML タグ（インラインノードの場合は `<span>`）をレンダリングしますが、これは変更できます。たとえば、  `<node-view-content as="p">` は段落をレンダリングする必要があります。ただし、1つの制限：そのタグは実行時に変更してはなりません。

## 利用可能なすべてのプロップ

高度なユースケースでは、コンポーネントにさらにいくつかのプロップを渡します。

<!-- For advanced use cases, we pass a few more props to the component. -->

### editor

<!-- The editor instance. -->

エディターインスタンス。

### node

<!-- Access the current node. -->

現在のノードにアクセスします。

### decorations

<!-- An array of decorations. -->

装飾の配列。

### selected

<!-- `true` when there is a `NodeSelection` at the current node view. -->

現在のノードビューに `NodeSelection` がある場合は `true`。

### extension

<!-- Access to the node extension, for example to get options. -->

たとえば、オプションを取得するためのノード拡張へのアクセス。

### getPos()

<!-- Get the document position of the current node. -->

現在のノードのドキュメント位置を取得します。

### updateAttributes()

<!-- Update attributes of the current node. -->

現在のノードの属性を更新します。

### deleteNode()

<!-- Delete the current node. -->

<!-- Here is the full list of what props you can expect: -->

現在のノードを削除します。

これがあなたが期待できる小道具の完全なリストです

```html
<template>
  <node-view-wrapper />
</template>

<script>

export default {
  components: {
    NodeViewWrapper,
  },

  props: {
    // the editor instance
    editor: {
      type: Object,
    },

    // the current node
    node: {
      type: Object,
    },

    // an array of decorations
    decorations: {
      type: Array,
    },

    // `true` when there is a `NodeSelection` at the current node view
    selected: {
      type: Boolean,
    },

    // access to the node extension, for example to get options
    extension: {
      type: Object,
    },

    // get the document position of the current node
    getPos: {
      type: Function,
    },

    // update attributes of the current node
    updateAttributes: {
      type: Function,
    },

    // delete the current node
    deleteNode: {
      type: Function,
    },
  },
}
</script>
```

<!-- If you just want to have all (and TypeScript support) you can 
すべて（および TypeScript サポート）が必要な場合は、次のようなすべての小道具をインポートできます。

```js
// Vue 3
export default defineComponent({
  props: nodeViewProps,
})

// Vue 2
export default Vue.extend({
  props: nodeViewProps,
})
```

## Dragging

<!-- To make your node views draggable, set `draggable: true` in the extension and add `data-drag-handle` to the DOM element that should function as the drag handle. -->

ノードビューをドラッグ可能にするには、拡張機能で「draggable: true」を設定し、ドラッグハンドルとして機能する DOM 要素に「data-drag-handle」を追加します。

https://embed.tiptap.dev/preview/GuideNodeViews/DragHandle



# 例

## はじめに

<!-- Node views enable you to fully customize your nodes. We are collecting a few different examples here. Feel free to copy them and start building on them. -->

<!-- Keep in mind that those are just examples to get you started, not officially supported extensions. We don’t have tests for them, and don’t plan to maintain them with the same attention as we do with official extensions. -->

ノードビューを使用すると、ノードを完全にカスタマイズできます。ここでは、いくつかの異なる例を収集しています。それらを自由にコピーして、それらの上に構築を開始してください。

これらは開始するための単なる例であり、公式にサポートされている拡張機能ではないことに注意してください。それらのテストはありません。また、公式の拡張機能と同じように注意を払って維持する予定もありません。

## ドラッグの取り扱い

<!-- Drag handles aren’t that easy to add. We are still on the lookout what’s the best way to add them. Official support will come at some point, but there’s no timeline yet. -->

ドラッグの取り扱いを追加するのはそれほど簡単ではありません。それらを追加するための最良の方法は、まだ検討中です。公式サポートはいつか来る予定ですが、まだタイムラインはありません。

https://embed.tiptap.dev/preview/GuideNodeViews/DragHandle

## 目次

<!-- This one loops through the editor content, gives all headings an ID and renders a Table of Contents with Vue. -->

これはエディターのコンテンツをループし、すべての見出しに ID を与え、Vue を使用して目次をレンダリングします。

https://embed.tiptap.dev/preview/GuideNodeViews/TableOfContents

## エディターでの描画

描画例は、エディター内での描画を可能にする SVG を示しています。

<!-- The drawing example shows a SVG that enables you to draw inside the editor. -->

https://embed.tiptap.dev/preview/Examples/Drawing

<!-- It’s not working very well with the Collaboration extension. It’s sending all data on every change, which can get pretty huge with Y.js. If you plan to use those two in combination, you need to improve it or your WebSocket backend will melt. -->

コラボレーション拡張機能ではうまく機能していません。すべての変更についてすべてのデータを送信しますが、Y.js ではかなり大きくなる可能性があります。これら 2つを組み合わせて使用​​する場合は、改善する必要があります。そうしないと、WebSocket バックエンドが溶けてしまいます。



# TypeScript の操作

## はじめに

<!-- The whole Tiptap codebase is written in TypeScript. If you haven’t heard of it or never used it, no worries. You don’t have to. -->

<!-- TypeScript extends JavaScript by adding types (hence the name). It adds new syntax, which doesn’t exist in Vanilla JavaScript. It’s actually removed before running in the browser, but this step – the compilation – is important to find bugs early. It checks if you pass the right types of data to functions. For a big and complex project, that’s very valuable. It means we’ll get notified of lots of bugs, before shipping code to you. -->

Tiptap コードベース全体は TypeScript で書かれています。聞いたことがない、または使用したことがない場合でも、心配はいりません。する必要はありません。

TypeScript は、型を追加することで JavaScript を拡張します（そのため、名前が付けられています）。 Vanilla JavaScript には存在しない新しい構文を追加します。ブラウザで実行する前に実際に削除されますが、バグを早期に発見するには、この手順（コンパイル）が重要です。適切なタイプのデータを関数に渡すかどうかをチェックします。大規模で複雑なプロジェクトの場合、それは非常に価値があります。これは、コードを送信する前に、多くのバグが通知されることを意味します。

<!-- **Anyway, if you don’t use TypeScript in your project, that’s fine.** You will still be able to use Tiptap and nevertheless get a nice autocomplete for the Tiptap API (if your editor supports it, but most do). -->

<!-- If you are using TypeScript in your project and want to extend Tiptap, there are two types that are good to know about. -->

**とにかく、プロジェクトでTypeScriptを使用しない場合は、それで問題ありません。** それでも、Tiptap を使用できますが、Tiptap API の優れたオートコンプリートを取得できます（エディターがサポートしている場合、ほとんどの場合はサポートしています）。

プロジェクトで TypeScript を使用していて、Tiptap を拡張したい場合は、知っておくと便利な2つのタイプがあります。

## タイプ

### オプションタイプ

拡張機能のデフォルトオプションを拡張または作成するには、カスタムタイプを定義する必要があります。次に例を示します。

<!-- To extend or create default options for an extension, you’ll need to define a custom type, here is an example: -->

```ts

export interface CustomExtensionOptions {
  awesomeness: number,
}

const CustomExtension = Extension.create<CustomExtensionOptions>({
  addOptions() {
    return {
      awesomeness: 100,
    }
  },
})
```

### ストレージタイプ

拡張ストレージにタイプを追加するには、それを2番目のタイプパラメータとして渡す必要があります。

<!-- To add types for your extension storage, you’ll have to pass that as a second type parameter. -->

```ts

export interface CustomExtensionStorage {
  awesomeness: number,
}

const CustomExtension = Extension.create<{}, CustomExtensionStorage>({
  name: 'customExtension',

  addStorage() {
    return {
      awesomeness: 100,
    }
  },
})
```

<!-- When using storage outside of the extension you have to manually set the type. -->

拡張機能の外部でストレージを使用する場合は、タイプを手動で設定する必要があります。

```

const customStorage = editor.storage.customExtension as CustomExtensionStorage
```

### コマンドタイプ

コアパッケージは `Command` タイプもエクスポートします。これは、コードで指定するすべてのコマンドに追加する必要があります。次に例を示します。

<!-- The core package also exports a `Command` type, which needs to be added to all commands that you specify in your code. Here is an example: -->

```ts

declare module '@tiptap/core' {
  interface Commands<ReturnType> {
    customExtension: {
      /**
       * Comments will be added to the autocomplete.
       */
      yourCommand: (someProp: any) => ReturnType,
    }
  }
}

const CustomExtension = Extension.create({
  addCommands() {
    return {
      yourCommand: someProp => ({ commands }) => {
        // …
      },
    }
  },
})
```

基本的にはそれだけです。残りはすべて自動的に行います。

<!-- That’s basically it. We’re doing all the rest automatically. -->

# はじめに

<!-- tiptap is a friendly wrapper around [ProseMirror](https://ProseMirror.net). Although Tiptap tries to hide most of the complexity of ProseMirror, it’s built on top of its APIs and we recommend you to read through the [ProseMirror Guide](https://ProseMirror.net/docs/guide/) for advanced usage. -->

Tiptap は、[ProseMirror](https://ProseMirror.net) のフレンドリーなラッパーです。 Tiptap は ProseMirror の複雑さのほとんどを隠そうとしますが、API の上に構築されているため、高度な使用法については [ProseMirror ガイド](https://ProseMirror.net/docs/guide/) を読むことをお勧めします。

### 構造

ProseMirror は、ドキュメントの許可された構造を定義する厳密な [Schema](/api/schema) で動作します。ドキュメントは、見出し、段落、その他の要素のツリー、いわゆるノードです。マークはノードに付けることができます。 g。その一部を強調します。[Commands](/api/commands) プログラムでそのドキュメントを変更します。

<!-- ProseMirror works with a strict [Schema](/api/schema), which defines the allowed structure of a document. A document is a tree of headings, paragraphs and others elements, so called nodes. Marks can be attached to a node, e. g. to emphasize part of it. [Commands](/api/commands) change that document programmatically. -->

### コンテンツ

ドキュメントは状態で保存されます。すべての変更は、トランザクションとして状態に適用されます。状態には、現在のコンテンツ、カーソル位置、および選択に関する詳細が含まれます。いくつかの異なる [events](/api/events) にフックして、たとえば、トランザクションが適用される前にトランザクションを変更することができます。

<!-- The document is stored in a state. All changes are applied as transactions to the state. The state has details about the current content, cursor position and selection. You can hook into a few different [events](/api/events), for example to alter transactions before they get applied. -->

### 拡張機能

拡張機能は、[nodes](/api/nodes)、[marks](/api/marks) または [functionalities](/api/extensions) をエディターに追加します。これらの拡張機能の多くは、コマンドを一般的な[キーボードショートカット](/api/keyboard-shortcuts) にバインドしていました。

<!-- Extensions add [nodes](/api/nodes), [marks](/api/marks) and/or [functionalities](/api/extensions) to the editor. A lot of those extensions bound their commands to common [keyboard shortcuts](/api/keyboard-shortcuts). -->

## 用語

ProseMirror には独自の語彙があり、時々それらすべての単語に出くわします。これは、ドキュメントで使用する最も一般的な単語の概要です。

<!-- ProseMirror has its own vocabulary and you’ll stumble upon all those words now and then. Here is a short overview of the most common words we use in the documentation. -->

| 用語        | 説明                                                              |
| ----------- | ------------------------------------------------------------------------ |
| Schema      | コンテンツが持つことができる構造を構成 |
| Document    | ドキュメント|エディターの実際のコンテンツ |
| State       | 現在のコンテンツとエディターの選択を説明するためのすべて |
| Transaction | 状態の変更（更新された選択、コンテンツなど） |
| Extension   | 新しい機能を登録 |
| Node        | 見出しや段落などのコンテンツのタイプ |
| Mark        | インラインフォーマットなどのノードに適用 |
| Command     | エディター内でアクションを実行すると、どういうわけか状態が変わる |
| Decoration  | 例として、間違いを強調するためにドキュメントの上にスタイリング |




# エディター

## はじめに

<!-- This class is a central building block of Tiptap. It does most of the heavy lifting of creating a working  [ProseMirror](https://ProseMirror.net/) editor such as creating the [`EditorView`](https://ProseMirror.net/docs/ref/#view.EditorView), setting the initial [`EditorState`](https://ProseMirror.net/docs/ref/#state.Editor_State)  -->

このクラスは、Tiptap の中心的な構成要素です。これは、[`EditorView`](https://ProseMirror.net/docs/ref/#view.EditorView) の作成など、機能する [ProseMirror](https://ProseMirror.net/) エディターを作成するための手間のかかる作業のほとんどを実行します）。初期設定 [`EditorState`](https://ProseMirror.net/docs/ref/#state.Editor_State) などを設定します。

## メソッド

エディターインスタンスは、一連のパブリックメソッドを提供します。メソッドは通常の関数であり、何でも返すことができます。編集者との共同作業に役立ちます。

メソッドを [コマンド](/api/commands) と混同しないでください。コマンドは、エディターの状態（コンテンツ、選択など）を変更し、`true` または `false` のみを返すために使用されます。

<!-- The editor instance will provide a bunch of public methods. Methods are regular functions and can return anything. They’ll help you to work with the editor. -->

<!-- Don’t confuse methods with [commands](/api/commands). Commands are used to change the state of editor (content, selection, and so on) and only return `true` or `false`. -->

### can()

<!-- Check if a command or a command chain can be executed – without actually executing it. Can be very helpful to enable/disable or show/hide buttons. -->

コマンドまたはコマンドチェーンを実際に実行せずに実行できるかどうかを確認します。ボタンを「有効 / 無効」または「表示 / 非表示」にするのに非常に役立ちます。

```js
// Returns `true` if the undo command can be executed
editor.can().undo()
```

### chain()

<!-- Create a command chain to call multiple commands at once. -->

一度に複数のコマンドを呼び出すコマンドチェーンを作成します。

```js
// Execute two commands at once
editor.chain().toggleBold().focus().run()
```

### destroy()

<!-- Stops the editor instance and unbinds all events. -->

エディタインスタンスを停止し、すべてのイベントのバインドを解除します。

```js
// Hasta la vista, baby!
editor.destroy()
```

### getHTML()

<!-- Returns the current editor document as HTML -->

現在のエディタドキュメントを HTML として返します

```js
editor.getHTML()
```

### getJSON()

<!-- Returns the current editor document as JSON. -->

現在のエディタードキュメントを JSON として返します。

```js
editor.getJSON()
```

### getText()

<!-- Returns the current editor document as plain text. -->

現在のエディタドキュメントをプレーンテキストとして返します。

| パラメーター  | タイプ                           | 説明              |
| ---------- | ------------------------------ | ------------------------ |
| options | { blockSeparator?: string, textSerializers?: Record<string, TextSerializer>} | シリアル化のオプション |

```js
// Give me plain text!
editor.getText()
// Add two line breaks between nodes
editor.getText({ blockSeparator: "\n\n" })
```

### getAttributes()

<!-- Get attributes of the currently selected node or mark. -->

現在選択されているノードまたはマークの属性を取得します。

| パラメーター  | タイプ                           | 説明              |
| ---------- | ------------------------------ | ------------------------ |
| typeOrName | string \| NodeType \| MarkType | ノード、またはマークの名前 |

```js
editor.getAttributes('link').href
```

### isActive()

<!-- Returns if the currently selected node or mark is active. -->

現在選択されているノードまたはマークがアクティブかどうかを返します。

| パラメーター              | タイプ                | 説明                    |
| ---------------------- | ------------------- | ------------------------------ |
| name                   | string \| null      | Name of the node or mark       |
| attributes             | Record<string, any> | Attributes of the node or mark |

```js
// Check if it’s a heading
editor.isActive('heading')
// Check if it’s a heading with a specific attribute value
editor.isActive('heading', { level: 2 })
// Check if it has a specific attribute value, doesn’t care what node/mark it is
editor.isActive({ textAlign: 'justify' })
```

### registerPlugin()

<!-- Register a ProseMirror plugin. -->

ProseMirror プラグインを登録

| パラメーター      | タイプ                                               | 説明                                               |
| -------------- | -------------------------------------------------- | --------------------------------------------------------- |
| plugin         | Plugin                                             | A ProseMirror plugin                                      |
| handlePlugins? | (newPlugin: Plugin, plugins: Plugin[]) => Plugin[] | Control how to merge the plugin into the existing plugins |

### setOptions()

<!-- Update editor options. -->

エディターオプションを更新

| パラメーター | タイプ                   | 説明       |
| --------- | ---------------------- | ----------------- |
| options   | Partial<EditorOptions> | A list of options |

```js
// Add a class to an existing editor instance
editor.setOptions({
  editorProps: {
    attributes: {
      class: 'my-custom-class',
    },
  },
})
```

### setEditable()

<!-- Update editable state of the editor. -->

エディターの編集可能な状態を更新

| パラメーター | タイプ    | 説明                                                   |
| --------- | ------- | ------------------------------------------------------------- |
| editable  | boolean | ユーザーがエディターに書き込める必要がある場合は `true` |

```js
// Make the editor read-only
editor.setEditable(false)
```

### unregisterPlugin()

<!-- Unregister a ProseMirror plugin. -->

ProseMirror プラグインの登録を解除します。

| パラメーター       | タイプ                | 説明      |
| --------------- | ------------------- | ---------------- |
| nameOrPluginKey | string \| PluginKey | The plugins name |

## ゲッター

### isEditable

<!-- Returns whether the editor is editable or read-only. -->

エディターが編集可能か読み取り専用かを返します。

```js
editor.isEditable
```

### isEmpty

<!-- Check if there is content. -->

コンテンツがあるかどうかを確認します。

```js
editor.isEmpty
```

## 設定

### element

<!-- The `element` specifies the HTML element the editor will be binded to. The following code will integrate Tiptap with an element with the `.element` class: -->

`element` は、エディタがバインドされるHTML要素を指定します。 次のコードは、Tiptapを `.element` クラスの要素と統合します。

```js

new Editor({
  element: document.querySelector('.element'),
  extensions: [
    StarterKit,
  ],
})
```

<!-- You can even initiate your editor before mounting it to an element. This is useful when your DOM is not yet available. Just leave out the `element`, we’ll create one for you. Append it to your container at a later date like that: -->

エディターを要素にマウントする前に、エディターを開始することもできます。これは、DOM がまだ利用できない場合に役立ちます。 `element` を省略してください。作成します。後日、次のようにコンテナに追加します。

```js
yourContainerElement.append(editor.options.element)
```

### extensions

段落のみを許可する場合でも、拡張機能のリストを `extensions` プロパティに渡す必要があります。

<!-- It’s required to pass a list of extensions to the `extensions` property, even if you only want to allow paragraphs. -->

```js

new Editor({
  // Use the default extensions
  extensions: [
    StarterKit,
  ],

  // … or use specific extensions
  extensions: [
    Document,
    Paragraph,
    Text,
  ],

  // … or both
  extensions: [
    StarterKit,
    Highlight,
  ],
})
```

### content

`content` プロパティを使用すると、エディタの初期コンテンツを提供できます。これは HTML または JSON にすることができます。

<!-- With the `content` property you can provide the initial content for the editor. This can be HTML or JSON. -->

```js

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
  ],
})
```

### editable

`editable` プロパティは、ユーザーがエディターに書き込めるかどうかを決定します。

<!-- The `editable` property determines if users can write into the editor. -->

```js

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
  ],
  editable: false,
})
```

### autofocus

`autofocus` を使用すると、初期化時にカーソルをエディター内で強制的にジャンプさせることができます。

<!-- With `autofocus` you can force the cursor to jump in the editor on initialization. -->

| Value     | 説明                                            |
| --------- | ------------------------------------------------------ |
| `'start'` | ドキュメントの先頭にフォーカスを設定 |
| `'end'`   | ドキュメントの最後にフォーカスを設定 |
| `'all'`   | ドキュメント全体を選択 |
| `Number`  | ドキュメント内の特定の位置にフォーカスを設定 |
| `true`    | オートフォーカスを有効 |
| `false`   | オートフォーカスを無効 |
| `null`    | オートフォーカスを無効 |

```js

new Editor({
  extensions: [
    StarterKit,
  ],
  autofocus: false,
})
```

### enableInputRules
By default, Tiptap enables all [input rules](/guide/custom-extensions/#input-rules). With `enableInputRules` you can control that.

デフォルトでは、Tiptap はすべての [入力ルール](/guide/custom-extensions/#input-rules)を有効にします。 `enableInputRules` を使用すると、それを制御できます。

```js

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
  ],
  enableInputRules: false,
})
```

<!-- Alternatively you can allow only specific input rules. -->

または、特定の入力ルールのみを許可することもできます。

```js

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
    Link,
  ],
  // pass an array of extensions or extension names
  // to allow only specific input rules
  enableInputRules: [Link, 'horizontalRule'],
})
```

### enablePasteRules
By default, Tiptap enables all [paste rules](/guide/custom-extensions/#paste-rules). With `enablePasteRules` you can control that.

デフォルトでは、Tiptap はすべての[貼り付けルール](/guide/custom-extensions/#paste-rules) を有効にします。 `enablePasteRules` を使用すると、それを制御できます。

```js

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
  ],
  enablePasteRules: false,
})
```

<!-- Alternatively you can allow only specific paste rules. -->

または、特定の貼り付けルールのみを許可することもできます。

```js

new Editor({
  content: `<p>Example Text</p>`,
  extensions: [
    StarterKit,
    Link,
  ],
  // pass an array of extensions or extension names
  // to allow only specific paste rules
  enablePasteRules: [Link, 'horizontalRule'],
})
```

### injectCSS
<!-- By default, Tiptap injects [a little bit of CSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts). With `injectCSS` you can disable that. -->

デフォルトでは、Tiptap は [少しのCSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) を挿入します。`injectCSS` を使用すると、それを無効にできます。

```js

new Editor({
  extensions: [
    StarterKit,
  ],
  injectCSS: false,
})
```

### injectNonce
<!-- When you use a [Content-Security-Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy) with `nonce`, you can specify a `nonce` to be added to dynamically created elements. Here is an example: -->

[Content-Security-Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy) を `nonce` で使用する場合、動的に作成された要素に追加する `nonce` を指定できます。次に例を示します。

```js

new Editor({
  extensions: [
    StarterKit,
  ],
  injectCSS: true,
  injectNonce: "your-nonce-here"
})
```

### editorProps
<!-- For advanced use cases, you can pass `editorProps` which will be handled by [ProseMirror](https://prosemirror.net/docs/ref/#view.EditorProps). You can use it to override various editor events or change editor DOM element attributes, for example to add some Tailwind classes. Here is an example: -->

高度なユースケースでは、[ProseMirror](https://prosemirror.net/docs/ref/#view.EditorProps) によって処理される `editorProps` を渡すことができます。これを使用して、さまざまなエディターイベントをオーバーライドしたり、エディターの DOM 要素属性を変更したりできます。たとえば、いくつかの Tailwind クラスを追加できます。次に例を示します。

```js
new Editor({
  // Learn more: https://prosemirror.net/docs/ref/#view.EditorProps
  editorProps: {
    attributes: {
      class: 'prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto focus:outline-none',
    },
    transformPastedText(text) {
      return text.toUpperCase()
    }
  }
})
```

<!-- You can use that to hook into event handlers and pass - for example - a custom paste handler, too. -->

これを使用して、イベントハンドラーにフックし、カスタムの貼り付けハンドラー（たとえば）を渡すこともできます。

### parseOptions
<!-- Passed content is parsed by ProseMirror. To hook into the parsing, you can pagitss `parseOptions` which are then handled by [ProseMirror](https://prosemirror.net/docs/ref/#model.ParseOptions). -->

渡されたコンテンツは ProseMirror によって解析されます。解析にフックするには、`parseOptions` を渡すことができます。これは、[ProseMirror](https://prosemirror.net/docs/ref/#model.ParseOptions) によって処理されます。

```js
new Editor({
  // Learn more: https://prosemirror.net/docs/ref/#model.ParseOptions
  parseOptions: {
    preserveWhitespace: 'full',
  },
})
```



# コマンド

## はじめに

<!-- The editor provides a ton of commands to programmatically add or change content or alter the selection. If you want to build your own editor you definitely want to learn more about them. -->

エディターには、コンテンツをプログラムで追加または変更したり、選択を変更したりするための多数のコマンドが用意されています。独自のエディターを作成したい場合は、間違いなくそれらについてもっと知りたいと思います。

## コマンドの実行

使用可能なすべてのコマンドには、エディターインスタンスからアクセスできます。ユーザーがボタンをクリックしたときにテキストを太字にしたい場合は次のようになります。

<!-- All available commands are accessible through an editor instance. Let’s say you want to make text bold when a user clicks on a button. That’s how that would look like: -->

```js
editor.commands.setBold()
```

<!-- While that’s perfectly fine and does make the selected bold, you’d likely want to change multiple commands in one run. Let’s have a look at how that works. -->

選択したものが太字になっていると思いますが、実際にコマンドを実行する際には **1回の実行で複数のコマンドを変更する** ことをお勧めします。それがどのように機能するかを見てみましょう。

### チェーンコマンド

ほとんどのコマンドは、1つの呼び出しに組み合わせることができます。ほとんどの場合、これは個別の関数呼び出しよりも短くなります。選択したテキストを太字にする例を次に示します。

<!-- Most commands can be combined to one call. That’s shorter than separate function calls in most cases. Here is an example to make the selected text bold: -->

```js
editor
  .chain()
  .focus()
  .toggleBold()
  .run()
```

<!-- The `.chain()` is required to start a new chain and the `.run()` is needed to actually execute all the commands in between. -->

<!-- In the example above two different commands are executed at once. When a user clicks on a button outside of the content, the editor isn’t in focus anymore. That’s why you probably want to add a `.focus()` call to most of your commands. It brings back the focus to the editor, so the user can continue to type. -->

<!-- All chained commands are kind of queued up. They are combined to one single transaction. That means, the content is only updated once, also the `update` event is only triggered once. -->

新しいチェーンを開始するには `.chain()` が必要であり、その間のすべてのコマンドを実際に実行するには `.run()` が必要です。

上記の例では、2つの異なるコマンドが同時に実行されます。ユーザーがコンテンツの外側のボタンをクリックすると、エディターはフォーカスされなくなります。そのため、ほとんどのコマンドに `.focus()` 呼び出しを追加することをお勧めします。これにより、フォーカスがエディターに戻されるため、ユーザーは入力を続けることができます。

連鎖したコマンドはすべて、一種のキューに入れられます。それらは1つの単一のトランザクションに結合されます。つまり、コンテンツは 1回だけ更新され、`update` イベントも1回だけトリガーされます。

#### カスタムコマンド内のチェーン

コマンドを連鎖させると、トランザクションは保留されます。カスタムコマンド内でコマンドをチェーンする場合は、上記のトランザクションを使用して追加する必要があります。これを行う方法は次のとおりです。

<!-- When chaining a command, the transaction is held back. If you want to chain commands inside your custom commands, you’ll need to use said transaction and add to it. Here is how you would do that: -->

```js
addCommands() {
  return {
    customCommand: attributes => ({ chain }) => {
      // Doesn’t work:
      // return editor.chain() …

      // Does work:
      return chain()
        .insertContent('foo!')
        .insertContent('bar!')
        .run()
    },
  }
}
```

### インライン コマンド

<!-- In some cases, it’s helpful to put some more logic in a command. That’s why you can execute commands in commands. I know, that sounds crazy, but let’s look at an example: -->

場合によっては、コマンドにさらにロジックを含めると便利です。そのため、コマンドでコマンドを実行できます。クレイジーに聞こえるかもしれませんが、例を見てみましょう。

```js
editor
  .chain()
  .focus()
  .command(({ tr }) => {
    // manipulate the transaction
    tr.insertText('hey, that’s cool!')

    return true
  })
  .run()
```

### コマンドのドライラン

<!-- Sometimes, you don’t want to actually run the commands, but only know if it would be possible to run commands, for example to show or hide buttons in a menu. That’s what we added `.can()` for. Everything coming after this method will be executed, without applying the changes to the document: -->

場合によっては、実際にコマンドを実行したくないが、メニューのボタンを表示または非表示にするなど、コマンドを実行できるかどうかしかわからないことがあります。そのために `.can()` を追加しました。このメソッドの後に続くものはすべて、ドキュメントに変更を適用せずに実行されます。

```js
editor
  .can()
  .toggleBold()
```

<!-- And you can use it together with `.chain()`, too. Here is an example which checks if it’s possible to apply all the commands: -->

また、`.chain()` と併用することもできます。すべてのコマンドを適用できるかどうかを確認する例を次に示します。

```js
editor
  .can()
  .chain()
  .toggleBold()
  .toggleItalic()
  .run()
```

<!-- Both calls would return `true` if it’s possible to apply the commands, and `false` in case it’s not. -->

<!-- In order to make that work with your custom commands, don’t forget to return `true` or `false`. -->

<!-- For some of your own commands, you probably want to work with the raw [transaction](/api/introduction). To make them work with `.can()` you should check if the transaction should be dispatched. Here is how you can create a simple `.insertText()` command: -->


コマンドを適用できる場合は両方の呼び出しで `true` が返され、適用できない場合は
`false` が返されます。

カスタムコマンドでそれを機能させるために、`true` または `false` を返すことを忘れないでください。

独自のコマンドのいくつかについては、生の[transaction](/api/introduction) を使用することをお勧めします。それらを `.can()` で機能させるには、トランザクションをディスパッチする必要があるかどうかを確認する必要があります。簡単な `.insertText()` コマンドを作成する方法は次のとおりです。

```js
export default (value) => ({ tr, dispatch }) => {
  if (dispatch) {
    tr.insertText(value)
  }

  return true
}
```

<!-- If you’re just wrapping another Tiptap command, you don’t need to check that, we’ll do it for you. -->

別の Tiptap コマンドをラップするだけの場合は、それをチェックする必要はありません。私たちが自動的に行います。

```js
addCommands() {
  return {
    bold: () => ({ commands }) => {
      return commands.toggleMark('bold')
    },
  }
}
```

<!-- If you’re just wrapping a plain ProseMirror command, you’ll need to pass `dispatch` anyway. Then there’s also no need to check it: -->

プレーンな ProseMirror コマンドをラップするだけの場合は、とにかく `dispatch` を渡す必要があります。次に、それをチェックする必要もありません。

```js

export default () => ({ state, dispatch }) => {
  return exitCode(state, dispatch)
}
```

### コマンドを試す

コマンドのリストを実行したいが、最初に成功したコマンドのみを適用したい場合は、`.first()` メソッドを使用してこれを行うことができます。このメソッドは次々にコマンドを実行し、最初に停止して `true` を返します。

たとえば、バックスペースキーは最初に入力ルールを元に戻そうとします。それが成功した場合、それはそこで止まります。入力ルールが適用されておらず、元に戻せない場合は、次のコマンドを実行し、選択範囲がある場合は削除します。簡略化した例を次に示します。

<!-- If you want to run a list of commands, but want only the first successful command to be applied, you can do this with the `.first()` method. This method runs one command after the other and stops at the first which returns `true`. -->

<!-- For example, the backspace key tries to undo an input rule first. If that was successful, it stops there. If no input rule has been applied and thus can’t be reverted, it runs the next command and deletes the selection, if there is one. Here is the simplified example: -->

```js
editor.first(({ commands }) => [
  () => commands.undoInputRule(),
  () => commands.deleteSelection(),
  // …
])
```

<!-- Inside of commands you can do the same thing like that: -->

コマンド内では、次のような同じことを行うことができます。

```js
export default () => ({ commands }) => {
  return commands.first([
    () => commands.undoInputRule(),
    () => commands.deleteSelection(),
    // …
  ])
}
```

## コマンドのリスト

以下にリストされているすべてのコアコマンドを見てください。彼らはあなたに何が可能かについての良い第一印象を与えるはずです。

<!-- Have a look at all of the core commands listed below. They should give you a good first impression of what’s possible. -->

### コンテンツ

| コマンド           | 説明                                              | リンク                                   |
| ------------------ | -------------------------------------------------------- | --------------------------------------- |
| clearContent()    | ドキュメント全体をクリア             | [詳細](/api/commands/clear-content)     |
| insertContent()   | 現在の位置にHTMLのノードまたは文字列を挿入 | [詳細](/api/commands/insert-content)    |
| insertContentAt() | HTMLのノードまたは文字列を特定の位置に挿入 | [詳細](/api/commands/insert-content-at) |
| setContent()      | ドキュメント全体を新しいコンテンツに置き換え          | [詳細](/api/commands/set-content)       |

### ノードとマーク

| コマンド                 | 説明                                               |                                 |
| ----------------------- | --------------------------------------------------------- | ------------------------------------ |
| clearNodes()           | ノードを単純な段落に正規化                  | [詳細](/api/commands/clear-nodes)  |
| createParagraphNear()  | 近くに段落を作成                                | [詳細](/api/commands/create-paragraph-near)  |
| deleteNode()           | ノードを削除                | [詳細](/api/commands/delete-node)  |
| extendMarkRange()      | テキスト選択を現在のマークまで拡張 | [詳細](/api/commands/extend-mark-range)  |
| exitCode()             | コードブロックを終了  | [詳細](/api/commands/exit-code)  |
| joinBackward()         | 2つのノードを逆方向に結合   | [詳細](/api/commands/join-backward)  |
| joinForward()          | 2つのノードを前方に結合          | [詳細](/api/commands/join-forward)  |
| lift()                 | 既存のラップを削除                          | [詳細](/api/commands/lift)  |
| liftEmptyBlock()       | 空の場合はブロックを持ち上げ          | [詳細](/api/commands/lift-empty-block)  |
| newlineInCode()        | コードに改行文字を追加   | [詳細](/api/commands/newline-in-code)  |
| resetAttributes()      | 一部のノードまたはマーク属性をデフォルト値にリセット | [詳細](/api/commands/reset-attributes)  |
| setMark()              | 新しい属性でマークを追加 | [詳細](/api/commands/set-mark)  |
| setNode()              | 指定された範囲をノードに置き換え | [詳細](/api/commands/set-node)  |
| splitBlock()           | 既存のノードから新しいノードをフォーク | [詳細](/api/commands/split-block)  |
| toggleMark()           | マークのオンとオフを切り替え | [詳細](/api/commands/toggle-mark)  |
| toggleNode()           | ノードを別のノードと切り替え | [詳細](/api/commands/toggle-node)  |
| toggleWrap()           | ノードを別のノードでラップするか、既存のラップを削除 | [詳細](/api/commands/toggle-wrap)  |
| undoInputRule()        | 入力ルールを元に戻す | [詳細](/api/commands/undo-input-rule)  |
| unsetAllMarks()        | 現在の選択のすべてのマークを削除します。 | [詳細]（/ api / Commands / unset-all-m | [詳細](/api/commands/unset-all-marks)  |
| unsetMark()            | 現在の選択のマークを削除 | [詳細](/api/commands/unset-mark)  |
| updateAttributes()     | ノードまたはマークの属性を更新  | [詳細](/api/commands/update-attributes)  |

### リスト

| コマンド          | 説明                                 | リンク                                |
| ---------------- | ------------------------------------------- | ------------------------------------ |
| liftListItem()  | リストアイテムをラッピングリストに持ち上げ | [詳細](/api/commands/lift-list-item)  |
| sinkListItem()  | リストアイテムを内側のリストに沈める | [詳細](/api/commands/sink-list-item)  |
| splitListItem() | 1つのリストアイテムを2つのリストアイテムに分割 | [詳細](/api/commands/split-list-item)  |
| toggleList()    | 異なるリストタイプを切り替え | [詳細](/api/commands/toggle-list)  |
| wrapInList()    | リスト内のノードをラップ | [詳細](/api/commands/wrap-in-list)  |

### 選択

| コマンド               | 選択                             | リンク                                |
| --------------------- | --------------------------------------- | ------------------------------------ |
| blur()               | エディターからフォーカスを削除 | [詳細](/api/commands/blur)  |
| deleteRange()        | 指定された範囲を削除 | [詳細](/api/commands/delete-range)  |
| deleteSelection()    | Delete the selection, if there is one.  | [詳細](/api/commands/delete-selection)  |
| enter()              | Trigger enter.                          | [詳細](/api/commands/enter)  |
| focus()              | Focus the editor at the given position. | [詳細](/api/commands/focus)  |
| keyboardShortcut()   | Trigger a keyboard shortcut.            | [詳細](/api/commands/keyboard-shortcut)  |
| scrollIntoView()     | Scroll the selection into view.         | [詳細](/api/commands/scroll-into-view)  |
| selectAll()          | Select the whole document.              | [詳細](/api/commands/select-all)  |
| selectNodeBackward() | Select a node backward.                 | [詳細](/api/commands/select-node-backward)  |
| selectNodeForward()  | Select a node forward.                  | [詳細](/api/commands/select-node-forward)  |
| selectParentNode()   | Select the parent node.                 | [詳細](/api/commands/select-parent-node)  |
| setNodeSelection()   | Creates a NodeSelection.                | [詳細](/api/commands/set-node-selection)  |
| setTextSelection()   | Creates a TextSelection.                | [詳細](/api/commands/set-text-selection)  |

<!-- ## Example use cases

### Quote a text
TODO

Add a blockquote, with a specified text, add a paragraph below, set the cursor there.

```js
// Untested, work in progress, likely to change
this.editor
  .chain()
  .focus()
  .createParagraphNear()
  .insertContent(text)
  .setBlockquote()
  .insertContent('<p></p>')
  .createParagraphNear()
  .unsetBlockquote()
  .createParagraphNear()
  .insertContent('<p></p>')
  .run()
```

Add a custom command to insert a node.
```js
addCommands() {
  return {
    insertTimecode: attributes => ({ chain }) => {
      return chain()
        .focus()
        .insertContent({
          type: 'heading',
          attrs: {
            level: 2,
          },
          content: [
            {
              type: 'text',
              text: 'heading',
            },
          ],
        })
        .insertText(' ')
        .run();
    },
  }
},
```
-->

## 独自のコマンドを書く

<!-- All extensions can add additional commands (and most do), check out the specific [documentation for the provided nodes](/api/nodes), [marks](/api/marks), and [extensions](/api/extensions) to learn more about those. And of course, you can [add your custom extensions](/guide/custom-extensions) with custom commands aswell. -->

すべての拡張機能は、コマンドを追加でき（ほとんどの場合、追加できます）、特定の [提供されたノードのドキュメント](/api/nodes)、[マーク]（/ api /マーク）、および  [拡張機能](/api/marks) を確認できます。 それらについてもっと学ぶために。 もちろん、カスタムコマンドを使用して[カスタム拡張機能を追加](/guide/custom-extensions) することもできます。

<!-- But how do you write those commands? There’s a little bit to learn about that. -->

しかし、これらのコマンドをどのように記述しますか？ それについて学ぶことが少しあります。

<!-- :::pro Oops, this is work in progress -->
<!-- A well-written documentation needs attention to detail, a great understanding of the project and time to write. -->

> pro **おっと、これは仕掛品です**
適切に作成されたドキュメントには、詳細に注意を払い、プロジェクトを十分に理解し、作成する時間が必要です。

<!-- Though Tiptap is used by thousands of developers all around the world, it’s still a side project for us. Let’s change that and make open source our full-time job! With nearly 300 sponsors we are half way there already. -->


Tiptap は世界中の何千もの開発者によって使用されていますが、それでも私たちにとっては副次的なプロジェクトです。 それを変えて、オープンソースを私たちのフルタイムの仕事にしましょう！ 300 近くのスポンサーがいるので、私たちはすでに中途半端です。

<!-- Join them and become a sponsor! Enable us to put more time into open source and we’ll fill this page and keep it up to date for you. -->

それらに参加してスポンサーになりましょう！ オープンソースにより多くの時間を費やせるようにしてください。このページに記入して、最新の状態に保ちます。

[GitHub でスポンサーになる →](https://github.com/sponsors/ueberdosis)
:::



# blur

このコマンドは、エディターからフォーカスを削除します。

<!-- This command removes the focus from the editor. -->

参照 : [focus](/api/commands/focus)

## 使い方

```js
// Remove the focus from the editor
editor.commands.blur()
```


# clearContent

`clearContent` コマンドは現在のドキュメントを削除します。

エディターは構成されたスキーマを適用し、ドキュメントは「null」にならないことに注意してください。 デフォルトの [`Document`](/api/nodes/document) は、デフォルトで段落である少なくとも 1つのブロックノードを持つことを想定しています。 言い換えると、そのコマンドを実行した後でも、ドキュメントには少なくとも 1つの（空の）段落があります。

<!-- The `clearContent` command deletes the current document. -->

<!-- Keep in mind that the editor will enforce the configured schema, and the document won’t be `null`. The default [`Document`](/api/nodes/document) expects to have at least one block node, which is the paragraph by default. In other words: Even after running that command the document will have at least one (empty) paragraph. -->

参照 : [setContent](/api/commands/set-content), [insertContent](/api/commands/insert-content)

## パラメータ

`emitUpdate: boolean (false)`

<!-- By default, it doesn’t trigger the update event. Passing `true` doesn’t prevent triggering the update event. -->

デフォルトでは、更新イベントはトリガーされません。`true` を渡しても、更新イベントのトリガーは妨げられません。

## 使い方

```js
// Remove all content from the document
editor.commands.clearContent()

// Remove all content, and trigger the `update` event
editor.commands.clearContent(true)
```


# clearNodes

`clearNodes` コマンドは、ノードをデフォルトノード（デフォルトでは段落）に正規化します。 あらゆる種類のリストを正規化することもできます。 高度なユースケースでは、新しいノードタイプを適用する前に便利です。

デフォルトノードをどのように定義できるか疑問に思われる場合：[`Document`](/api/nodes/document) の `content` 属性の内容によって異なりますが、デフォルトでは `block+`（少なくとも1つのブロックノード）です。[`Paragraph`](/api/nodes/paragraph) ノードの優先度が最も高いため、最初に読み込まれるため、デフォルトのノードになります。

<!-- The `clearNodes` command normalizes nodes to the default node, which is the paragraph by default. It’ll even normalize all kind of lists. For advanced use cases it can come in handy, before applying a new node type. -->

<!-- If you wonder how you can define the default node: It depends on what’s in the `content` attribute of your [`Document`](/api/nodes/document), by default that’s `block+` (at least one block node) and the [`Paragraph`](/api/nodes/paragraph) node has the highest priority, so it’s loaded first and is therefore the default node. -->

## 使い方

```js
editor.commands.clearNodes()
```


# createParagraphNear

<!-- If a block node is currently selected, the `createParagraphNear` command creates an empty paragraph after the currently selected block node. If the selected block node is the first child of its parent, the new paragraph will be inserted before the current selection. -->

ブロックノードが現在選択されている場合、 `createParagraphNear` コマンドは、現在選択されているブロックノードの後に空の段落を作成します。 選択したブロックノードがその親の最初の子である場合、新しい段落が現在の選択の前に挿入されます。

## 使い方

```js
editor.commands.createParagraphNear()
```

# deleteNode

<!-- The `deleteNode` command deletes a node inside the current selection. It requires a `typeOrName` argument, which can be a string or a `NodeType` to find the node that needs to be deleted. After deleting the node, the view will automatically scroll to the cursors position. -->

`deleteNode` コマンドは、現在の選択範囲内のノードを削除します。 削除する必要のあるノードを見つけるには、文字列または `NodeType` の `typeOrName` 引数が必要です。 ノードを削除すると、ビューは自動的にカーソル位置までスクロールします。

## パラメータ

`typeOrName: string | NodeType`

## 使い方

```js
// deletes a paragraph node
editor.commands.deleteNode('paragraph')

// or

// deletes a custom node
editor.commands.deleteNode(MyCustomNode)
```

# deleteRange

<!-- The `deleteRange` command deletes everything in a given range. It requires a `range` attribute of type `Range`. -->

`deleteRange` コマンドは、指定された範囲内のすべてを削除します。 タイプ `Range` の `range` 属性が必要です。

## パラメータ

`range: Range`

## 使い方

```js
editor.commands.deleteRange({ from: 0, to: 12 })
```

# deleteSelection

<!-- The `deleteSelection` command deletes the currently selected nodes. If no selection exists, nothing will be deleted. -->

`deleteSelection` コマンドは、現在選択されているノードを削除します。選択が存在しない場合、何も削除されません。

## 使い方

```js
editor.commands.deleteSelection()
```

# enter

<!-- The `enter` command triggers an enter programmatically. -->

`enter` コマンドは、プログラムで Enter をトリガーします。

## 使い方

```js
editor.commands.enter()
```

# exitCode

<!-- The `exitCode` command will create a default block after the current selection if the selection is a `code` element and move the cursor to the new block. -->

選択が `code` 要素である場合、`exitCode` コマンドは現在の選択の後にデフォルトのブロックを作成し、カーソルを新しいブロックに移動します。

## 使い方

```js
editor.commands.exitCode()
```

# extendMarkRange

<!-- The `extendMarkRange` command expands the current selection to encompass the current mark. If the current selection doesn’t have the specified mark, nothing changes. -->

`extendMarkRange` コマンドは、現在の選択範囲を拡張して、現在のマークを包含します。 現在の選択に指定されたマークがない場合、何も変更されません。

## パラメータ

`typeOrName: string | MarkType`

マークの名前、またはタイプ。

`attributes?: Record<string, any>`

<!-- Optionally, you can specify attributes that the extented mark must contain. -->

オプションで、拡張マークに含める必要のある属性を指定できます。

## 使い方

```js
// Expand selection to link marks
editor.commands.extendMarkRange('link')

// Expand selection to link marks with specific attributes
editor.commands.extendMarkRange('link', { href: 'https://google.com' })

// Expand selection to link mark and update attributes
editor
  .chain()
  .extendMarkRange('link')
  .updateAttributes('link', {
    href: 'https://duckduckgo.com'
  })
  .run()
```

# focus

<!-- This command sets the focus back to the editor. -->

<!-- When a user clicks on a button outside the editor, the browser sets the focus to that button. In most scenarios you want to focus the editor then again. That’s why you’ll see that in basically every demo here. -->

このコマンドは、フォーカスをエディターに戻します。

ユーザーがエディターの外側のボタンをクリックすると、ブラウザーはそのボタンにフォーカスを設定します。ほとんどのシナリオでは、エディターに再び焦点を合わせたいと思います。そのため、基本的にここのすべてのデモでそれを確認できます。

参照 : [setTextSelection](/api/commands/set-text-selection), [blur](/api/commands/blur)

## パラメータ

`position: 'start' | 'end' | 'all' | number | boolean | null (false)`

<!-- By default, it’s restoring the cursor position (and text selection). Pass a position to move the cursor too. -->

デフォルトでは、カーソル位置（およびテキスト選択）が復元されます。カーソルを移動する位置も渡します。

`options: { scrollIntoView: boolean }`

<!-- Defines whether to scroll to the cursor when focusing. Defaults to `true`. -->

フォーカス時にカーソルまでスクロールするかどうかを定義します。デフォルトは `true` です。

## 使い方

```js
// Set the focus to the editor
editor.commands.focus()

// Set the cursor to the first position
editor.commands.focus('start')

// Set the cursor to the last position
editor.commands.focus('end')

// Selects the whole document
editor.commands.focus('all')

// Set the cursor to position 10
editor.commands.focus(10)
```

# forEach

<!-- Loop through an array of items. -->

アイテムの配列をループします。

## パラメータ

`items: any[]`

<!-- An array of items. -->

アイテムの配列。

`fn: (item: any, props: CommandProps & { index: number }) => boolean`

<!-- A function to do anything with your item. -->

あなたのアイテムで何でもする機能。

## 使い方

```js
const items = ['foo', 'bar', 'baz']

editor.commands.forEach(items, (item, { commands }) => {
  return commands.insertContent(item)
})
```

# insertContent

<!-- The `insertContent` command adds the passed value to the document. -->

`insertContent`コマンドは、渡された値をドキュメントに追加します。

参照 : [setContent](/api/commands/set-content), [clearContent](/api/commands/clear-content)

## パラメーター

`value: Content`

<!-- The command is pretty flexible and takes plain text, HTML or even JSON as a value. -->

このコマンドは非常に柔軟性があり、プレーンテキスト、HTML、さらにはJSONを値として受け取ります。

## 使い方

```js
// Plain text
editor.commands.insertContent('Example Text')

// HTML
editor.commands.insertContent('<h1>Example Text</h1>')

// HTML with trim white space
editor.commands.insertContent('<h1>Example Text</h1>', 
{
  parseOptions: {
    preserveWhitespace: false,
  }
})

// JSON/Nodes
editor.commands.insertContent({
  type: 'heading',
  attrs: {
    level: 1,
  },
  content: [
    {
      type: 'text',
      text: 'Example Text',
    },
  ],
})

// Multiple nodes at once
editor.commands.insertContent([
  {
    type: 'paragraph',
    content: [
      {
        type: 'text',
        text: 'First paragraph',
      },
    ],
  },
  {
    type: 'paragraph',
    content: [
      {
        type: 'text',
        text: 'Second paragraph',
      },
    ],
  },
])
```


# insertContentAt

<!-- The `insertContentAt` will insert a string of html or a node at a given position or range. If a range is given, the new content will replace the content in the given range with the new content. -->

`insertContentAt` は、指定された位置または範囲に HTML の文字列またはノードを挿入します。 範囲が指定されている場合、新しいコンテンツは指定された範囲のコンテンツを新しいコンテンツに置き換えます。

## パラメータ

`position: number | Range`

<!-- The position or range the content will be inserted in. -->

コンテンツが挿入される位置または範囲。

`value: Content`

<!-- The content to be inserted. Can be a string of HTML or a node. -->

挿入するコンテンツ。 HTMLの文字列またはノードにすることができます。

`options: Record<string, any>`

<!-- * updateSelection: controls if the selection should be moved to the newly inserted content.
* parseOptions: Passed content is parsed by ProseMirror. To hook into the parsing, you can pass `parseOptions` which are then handled by [ProseMirror](https://prosemirror.net/docs/ref/#model.ParseOptions). -->

* updateSelection：選択範囲を新しく挿入されたコンテンツに移動するかどうかを制御します。
* parseOptions：渡されたコンテンツは ProseMirror によって解析されます。 解析にフックするには、`parseOptions` を渡すことができます。これは、[ProseMirror](https://prosemirror.net/docs/ref/#model.ParseOptions) によって処理されます。

## 使い方

```js
editor.commands.insertContentAt(12, '<p>Hello world</p>', {
  updateSelection: true,
  parseOptions: {
    preserveWhitespace: 'full',
  }
})
```

# joinBackward

<!-- The `joinBackward` command joins two nodes backwards from the current selection. If the selection is empty and at the start of a textblock, `joinBackward` will try to reduce the distance between that block and the block before it. [See also](https://prosemirror.net/docs/ref/#commands.joinBackward) -->

`joinBackward` コマンドは、現在の選択から2つのノードを逆方向に結合します。 選択範囲が空で、テキストブロックの先頭にある場合、 `joinBackward` は、そのブロックとその前のブロックとの間の距離を縮めようとします。

[参照](https://prosemirror.net/docs/ref/#commands.joinBackward)

## 使い方

```js
editor.commands.joinBackward()
```

# joinForward

<!-- The `joinForward` command joins two nodes forwards from the current selection. If the selection is empty and at the end of a textblock, `joinForward` will try to reduce the distance between that block and the block after it. [See also](https://prosemirror.net/docs/ref/#commands.joinForward) -->

`joinBackward` コマンドは、現在の選択から2つのノードを逆方向に結合します。 選択範囲が空で、テキストブロックの先頭にある場合、 `joinBackward` は、そのブロックとその前のブロックとの間の距離を縮めようとします。

[参照](https://prosemirror.net/docs/ref/#commands.joinForward)

## 使い方
```js
editor.commands.joinForward()
```


# keyboardShortcut

<!-- The `keyboardShortcut` command will try to trigger a ShortcutEvent with a given name. -->

`keyboardShortcut` コマンドは、指定された名前で ShortcutEvent をトリガーしようとします。

## パラメーター

`name: String`

<!-- The name of the shortcut to trigger. -->

トリガーへのショートカットの名前。

## 使い方

```js
editor.commands.keyboardShortcut('undo')
```

# liftEmptyBlock

<!-- If the currently selected block is an empty textblock, lift it if possible. **Lifting** means, that the block will be moved to the parent of the block it is currently in. -->

現在選択されているブロックが空のテキストブロックである場合は、可能であればそれを持ち上げます。 **リフティング** は、ブロックが現在のブロックの親に移動されることを意味します。

## 使い方

```js
editor.commands.liftEmptyBlock()
```

# liftListItem

<!-- The `liftListItem` will try to lift the list item around the current selection up into a wrapping parent list. -->

`liftListItem` は、現在の選択範囲の周りのリストアイテムをラップする親リストに持ち上げようとします。

## 使い方

```js
editor.commands.liftListItem()
```

# lift

<!-- The `lift` command lifts a given node up into it's parent node. **Lifting** means, that the block will be moved to the parent of the block it is currently in. -->

`lift` コマンドは、特定のノードをその親ノードに持ち上げます。 **リフティング** は、ブロックが現在のブロックの親に移動されることを意味します。

## パラメータ

`typeOrName: String | NodeType`

<!-- The node that should be lifted. If the node is not found in the current selection, ignore the command. -->

持ち上げる必要のあるノード。 現在の選択でノードが見つからない場合は、コマンドを無視してください。

`attributes: Record<string, any>`

<!-- The attributes the node should have to be lifted. This is **optional**. -->

ノードを解除する必要がある属性。 これは **オプション** です。

## 使い方

```js
// lift any headline
editor.commands.lift('headline')

// lift only h2
editor.commands.lift('headline', { level: 2 })
```

# newlineInCode

<!-- `newlineInCode` inserts a new line in the current code block. If a selection is set, the selection will be replaced with a newline character. -->

`newlineInCode` は、現在のコードブロックに新しい行を挿入します。 選択範囲が設定されている場合、選択範囲は改行文字に置き換えられます。

## 使い方

```js
editor.commands.newlineInCode()
```

# resetAttributes

<!-- `resetAttributes` resets some of the nodes attributes back to it's default attributes. -->

`resetAttributes` は、ノード属性の一部をデフォルトの属性にリセットします。

## パラメータ

`typeOrName: string | Node`

<!-- The node that should be resetted. Can be a string or a Node. -->

リセットする必要のあるノード。 文字列またはノードにすることができます。

`attributes: string | string[]`

<!-- A string or an array of strings that defines which attributes should be reset. -->

リセットする属性を定義する文字列または文字列の配列。

## 使い方

```js
// reset the style and class attributes on the currently selected paragraph nodes
editor.commands.resetAttributes('paragraph', ['style', 'class'])
```

# scrollIntoView

<!-- `scrollIntoView` scrolls the view to the current selection or cursor position. -->

`scrollIntoView` は、ビューを現在の選択またはカーソル位置にスクロールします。

## 使い方
```js
editor.commands.scrollIntoView()
```

# selectAll

<!-- Selects the whole document at once. -->

ドキュメント全体を一度に選択します。

## 使い方

```js
// Select the whole document
editor.commands.selectAll()
```

# selectNodeBackward

<!-- If the selection is empty and at the start of a textblock, `selectNodeBackward` will select the node before the current textblock if possible. -->

選択範囲が空でテキストブロックの先頭にある場合、可能であれば、`selectNodeBackward` は現在のテキストブロックの前のノードを選択します。

## 使い方

```js
editor.commands.selectNodeBackward()
```

# selectNodeForward

<!-- If the selection is empty and at the end of a textblock, `selectNodeForward` will select the node after the current textblock if possible. -->

選択範囲が空でテキストブロックの最後にある場合、可能であれば、`selectNodeForward` は現在のテキストブロックの後のノードを選択します。

## 使い方

```js
editor.commands.selectNodeForward()
```

# selectParentNode

<!-- `selectParentNode` will try to get the parent node of the currently selected node and move the selection to that node. -->

`selectParentNode` は、現在選択されているノードの親ノードを取得し、選択範囲をそのノードに移動しようとします。

## 使い方

```js
editor.commands.selectParentNode()
```

# selectTextblockEnd

<!-- The `selectTextblockEnd` will move the cursor to the end of the current textblock if the block is a valid textblock. -->

ブロックが有効なテキストブロックである場合、`selectTextblockEnd` はカーソルを現在のテキストブロックの最後に移動します。

## 使い方

```js
editor.commands.selectTextblockEnd()
```

# selectTextblockStart

<!-- The `selectTextblockStart` will move the cursor to the start of the current textblock if the block is a valid textblock. -->

ブロックが有効なテキストブロックである場合、`selectTextblockStart` はカーソルを現在のテキストブロックの先頭に移動します。

## 使い方

```js
editor.commands.selectTextblockStart()
```

# setContent

<!-- The `setContent` command replaces the document with a new one. You can pass JSON or HTML, both work fine. It’s basically the same as setting the `content` on initialization. -->

`setContent` コマンドは、ドキュメントを新しいものに置き換えます。 JSON または HTML を渡すことができ、どちらも正常に機能します。基本的には、初期化時に「コンテンツ」を設定するのと同じです。

参照 : [insertContent](/api/commands/insert-content), [clearContent](/api/commands/clear-content)

## パラメータ

`content: string`

<!-- Pass a string (JSON or HTML) as [content](/guide/output). The editor will only render what’s allowed according to the [schema](/api/schema). -->

文字列（JSONまたはHTML）を [content](/api/schema) として渡します。エディターは、[schema](/api/schema) に従って許可されているもののみをレンダリングします。

`emitUpdate?: Boolean (false)`

<!-- By default, it doesn’t trigger the update event. Passing `true` doesn’t prevent triggering the update event. -->

デフォルトでは、更新イベントはトリガーされません。`true` を渡しても、更新イベントのトリガーは妨げられません。

`parseOptions?: Record<string, any>`

<!-- Options to configure the parsing can be passed during initialization and/or with setContent. Read more about parseOptions in the [ProseMirror documentation](https://prosemirror.net/docs/ref/#model.ParseOptions). -->

解析を構成するためのオプションは、初期化中および / または setContent を使用して渡すことができます。 parseOptions の詳細については、[ProseMirrorドキュメント](https://prosemirror.net/docs/ref/#model.ParseOptions) を参照してください。

## 使い方

```js
// HTML
editor.commands.setContent('<p>Example Text</p>')

// JSON
editor.commands.setContent({
  "type": "doc",
  "content": [
    {
      "type": "paragraph",
      "content": [
        {
          "type": "text",
          "text": "Example Text"
        }
      ]
    }
  ]
})
```


# setMark

<!-- The `setMark` command will add a new mark at the current selection. -->

`setMark` コマンドは、現在の選択に新しいマークを追加します。

## パラメーター

`typeOrName: string | MarkType`

<!-- The type of a mark to add. Can be a string or a MarkType. -->

追加するマークのタイプ。 文字列または MarkType にすることができます。

`attributes: Record<string, any>`

<!-- The attributes that should be applied to the mark. **This is optional.** -->

マークに適用する必要のある属性。**これはオプションです。**

## 使い方

```js
editor.commands.setMark("bold", { class: 'bold-tag' })
```

# setMeta

<!-- Store a metadata property in the current transaction. -->

現在のトランザクションにメタデータプロパティを保存します。

## パラメーター

`key: string`

<!-- The name of your metadata. You can get its value at any time with [getMeta](https://prosemirror.net/docs/ref/#state.Transaction.getMeta). -->

メタデータの名前。[getMeta](https://prosemirror.net/docs/ref/#state.Transaction.getMeta) を使用すると、いつでもその値を取得できます。

`value: any`

<!-- Store any value within your metadata. -->

メタデータ内に任意の値を保存します。

## 使い方

```js
// Prevent the update event from being triggered
editor.commands.setMeta('preventUpdate', true)

// Store any value in the current transaction.
// You can get this value at any time with tr.getMeta('foo').
editor.commands.setMeta('foo', 'bar')
```

# setNode

<!-- The `setNode` command will replace a given range with a given node. The range depends on the current selection. **Important**: Currently `setNode` only supports text block nodes. -->

`setNode` コマンドは、指定された範囲を指定されたノードに置き換えます。 範囲は現在の選択によって異なります。 **重要**：現在、`setNode` はテキストブロックノードのみをサポートしています。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of the node that will replace the range. Can be a string or a NodeType. -->

範囲を置き換えるノードのタイプ。 文字列または NodeType にすることができます。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the node. **This is optional.** -->

ノードに適用する必要がある属性。 **これはオプションです。**

## 使い方

```js
editor.commands.setNode("paragraph", { id: "paragraph-01" })
```

# setNodeSelection

<!-- `setNodeSelection` creates a new NodeSelection at a given position. A node selection is a selection that points to a single node. [See more](https://prosemirror.net/docs/ref/#state.NodeSelection) -->

`setNodeSelection` は、指定された位置に新しい NodeSelection を作成します。 ノード選択は、単一のノードを指す選択です。 [もっと見る](https://prosemirror.net/docs/ref/#state.NodeSelection)

## パラメーター

`position: number`

<!-- The position the NodeSelection will be created at. -->

NodeSelection が作成される位置。

## 使い方

```js
editor.commands.setNodeSelection(10)
```

# setTextSelection

<!-- If you think of selection in the context of an editor, you’ll probably think of a text selection. With `setTextSelection` you can control that text selection and set it to a specified range or position. -->

エディターのコンテキストでの選択について考える場合、おそらくテキストの選択について考えるでしょう。`setTextSelection` を使用すると、そのテキスト選択を制御し、指定した範囲または位置に設定できます。

参照 : [focus](/api/commands/focus), [setNodeSelection](/api/commands/set-node-selection), [deleteSelection](/api/commands/delete-selection), [selectAll](/api/commands/select-all)

## パラメーター

`position: number | Range`

<!-- Pass a number, or a Range, for example `{ from: 5, to: 10 }`. -->

数値または範囲を渡します（例：`{from：5 to：10}`）。

## 使い方

```js
// Set the cursor to the specified position
editor.commands.setTextSelection(10)

// Set the text selection to the specified range
editor.commands.setTextSelection({ from: 5, to: 10 })
```


# sinkListItem

<!-- The `sinkListItem` will try to sink the list item around the current selection down into a wrapping child list. -->

`sinkListItem` は、現在の選択範囲の周りのリストアイテムをラッピングする子リストにシンクしようとします。

## 使い方

```js
editor.commands.liftListItem()
```

# splitBlock

<!-- `splitBlock` will split the current node into two nodes at the current [NodeSelection](https://prosemirror.net/docs/ref/#state.NodeSelection). If the current selection is not splittable, the command will be ignored. -->

`splitBlock` は、現在の [NodeSelection](https://prosemirror.net/docs/ref/#state.NodeSelection) で現在のノードを2つのノードに分割します。 現在の選択が分割可能でない場合、コマンドは無視されます。

## パラメーター

`options: Record<string, any>`

<!-- * `keepMarks: boolean` - Defines if the marks should be kept or removed. Defaults to `true`. -->

* `keepMarks: boolean` - マークを保持するか削除するかを定義します。 デフォルトは `true` です。

## 使い方

```js
// split the current node and keep marks
editor.commands.splitBlock()

// split the current node and don't keep marks
editor.commands.splitBlock({ keepMarks: false })
```

# splitListItem

<!-- `splitListItem` splits one list item into two separate list items. If this is a nested list, the wrapping list item should be split. -->

`splitListItem` は、1つのリストアイテムを2つの別々のリストアイテムに分割します。 これがネストされたリストである場合、ラッピングリストアイテムは分割する必要があります。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of node that should be split into two separate list items. -->

2つの別々のリスト項目に分割する必要があるノードのタイプ。

## 使い方

```js
editor.commands.splitListItem('bullet_list')
```

# toggleList

<!-- `toggleList` will toggle between different types of lists. -->

`toggleList`は、異なるタイプのリストを切り替えます。

## パラメーター

`listTypeOrName: string | NodeType`

<!-- The type of node that should be used for the wrapping list -->

ラッピングリストに使用する必要があるノードのタイプ

`itemTypeOrName: string | NodeType`

<!-- The type of node that should be used for the list items -->

リストアイテムに使用する必要があるノードのタイプ

## 使い方

```js
// toggle a bullet list with list items
editor.commands.toggleList('bullet_list', 'list_item')

// toggle a numbered list with list items
editor.commands.toggleList('ordered_list', 'list_item')
```

# toggleMark

<!-- The `toggleMark` command toggles a specific mark on and off at the current selection. -->

`toggleList` は、異なるタイプのリストを切り替えます。

## パラメーター

`typeOrName: string | MarkType`

<!-- The type of mark that should be toggled. -->

切り替える必要のあるマークのタイプ。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the mark. **This is optional.** -->

マークに適用する必要のある属性。 **これはオプションです。**

`options?: Record<string, any>`

* `extendEmptyMarkRange: boolean` - 現在の選択範囲全体でもマークを削除します。 デフォルトは `false` です

<!-- `options?: Record<string, any>` -->
<!-- * `extendEmptyMarkRange: boolean` - Removes the mark even across the current selection. Defaults to `false` -->

## 使い方

```js
// toggles a bold mark
editor.commands.toggleMark('bold')

// toggles bold mark with a color attribute
editor.commands.toggleMark('bold', { color: 'red' })

// toggles a bold mark with a color attribute and removes the mark across the current selection
editor.commands.toggleMark('bold', { color: 'red' }, { extendEmptyMarkRange: true })
```

# toggleNode

<!-- `toggleNode` will a node with another node. -->

`toggleNode` は別のノードを持つノードになります。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of node that should be toggled. -->

切り替える必要のあるノードのタイプ。

`toggleTypeOrName: string | NodeType`

<!-- The type of node that should be used for the toggling. -->

トグルに使用する必要があるノードのタイプ。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the node. **This is optional.** -->

ノードに適用する必要がある属性。 **これはオプションです。**

## 使い方

```js
// toggle a paragraph with a heading node
editor.commands.toggleNode('paragraph', 'heading', { level: 1 })

// toggle a paragraph with a image node
editor.commands.toggleNode('paragraph', 'image', { src: 'https://example.com/image.png' })
```

# toggleWrap

<!-- `toggleWrap` wraps the current node with a new node or removes a wrapping node. -->

`toggleWrap`は、現在のノードを新しいノードでラップするか、ラップしているノードを削除します。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of node that should be used for the wrapping node. -->

ラッピングノードに使用する必要があるノードのタイプ。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the node. **This is optional.** -->

ノードに適用する必要がある属性。**これはオプションです。**

## 使い方

```js
// toggle wrap the current selection with a heading node
editor.commands.toggleWrap('heading', { level: 1 })
```

# undoInputRule

<!-- `undoInputRule` will undo the most recent input rule that was triggered. -->

`undoInputRule` は、トリガーされた最新の入力ルールを元に戻します。

## 使い方

```js
editor.commands.undoInputRule()
```

# unsetAllMarks

<!-- `unsetAllMarks` will remove all marks from the current selection. -->

`unsetAllMarks` は、現在の選択からすべてのマークを削除します。

## 使い方

```js
editor.commands.unsetAllMarks()
```

# unsetMark

<!-- `unsetMark` will remove the mark from the current selection. Can also remove all marks across the current selection. -->

`unsetMark` は、現在の選択からマークを削除します。 現在の選択範囲全体のすべてのマークを削除することもできます。

## パラメーター

`typeOrName: string | MarkType`

<!-- The type of mark that should be removed. -->

削除する必要のあるマークのタイプ。

`options?: Record<string, any>`

<!-- * `extendEmptyMarkRange?: boolean` - Removes the mark even across the current selection. Defaults to `false` -->

* `extendEmptyMarkRange?:boolean` - 現在の選択範囲全体でもマークを削除します。 デフォルトは `false` です

## 使い方

```js
// removes a bold mark
editor.commands.unsetMark('bold')

// removes a bold mark across the current selection
editor.commands.unsetMark('bold', { extendEmptyMarkRange: true })
```

# updateAttributes

<!-- The `updateAttributes` command sets attributes of a node or mark to new values. Not passed attributes won’t be touched. -->

`updateAttributes` コマンドは、ノードまたはマークの属性を新しい値に設定します。 渡されなかった属性は変更されません。

参照 : [extendMarkRange](/api/commands/extend-mark-range)

## パラメーター

`typeOrName: string | NodeType | MarkType`

<!-- Pass the type you want to update, for example `'heading'`. -->

更新するタイプを渡します（例： `'heading'`）。

`attributes: Record<string, any>`

<!-- This expects an object with the attributes that need to be updated. It doesn’t need to have all attributes. -->

これは、更新する必要のある属性を持つオブジェクトを想定しています。 すべての属性を持っている必要はありません。

## 使い方

```js
// Update node attributes
editor.commands.updateAttributes('heading', { level: 1 })

// Update mark attributes
editor.commands.updateAttributes('highlight', { color: 'pink' })
```


# wrapInList

<!-- `wrapInList` will wrap a node in the current selection in a list. -->

`wrapInList` は、リスト内の現在の選択のノードをラップします。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of node that should be wrapped in a list. -->

リストにラップする必要があるノードのタイプ。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the list. **This is optional.** -->

リストに適用する必要のある属性。**これはオプションです。**

## 使い方

```js
// wrap a paragraph in a bullet list
editor.commands.wrapInList('paragraph')
```



# ノード

## はじめに

<!-- If you think of the document as a tree, then nodes are just a type of content in that tree. Examples of nodes are paragraphs, headings, or code blocks. But nodes don’t have to be blocks. They can also be rendered inline with the text, for example for **@mentions**. -->

ドキュメントをツリーと考えると、ノードはそのツリーのコンテンツの一種にすぎません。ノードの例は、段落、見出し、またはコードブロックです。ただし、ノードはブロックである必要はありません。たとえば、`@mentions` の場合は、テキストとインラインでレンダリングすることもできます。

## サポートされているノードのリスト

| Title                                        | StarterKit ([view](/api/extensions/starter-kit)) | Source Code                                                                                  |
| -------------------------------------------- | ------------------------------------------------ | -------------------------------------------------------------------------------------------- |
| [Blockquote](/api/nodes/blockquote)          | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-blockquote/)      |
| [BulletList](/api/nodes/bullet-list)         | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bullet-list/)     |
| [CodeBlock](/api/nodes/code-block)           | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code-block/)      |
| [Document](/api/nodes/document)              | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-document/)        |
| [Emoji](/api/nodes/emoji)                    | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-emoji/)           |
| [HardBreak](/api/nodes/hard-break)           | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-hard-break/)      |
| [Hashtag](/api/nodes/hashtag)                | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-hashtag/)         |
| [Heading](/api/nodes/heading)                | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-heading/)         |
| [HorizontalRule](/api/nodes/horizontal-rule) | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-horizontal-rule/) |
| [Image](/api/nodes/image)                    | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-image/)           |
| [ListItem](/api/nodes/list-item)             | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-list-item/)       |
| [Mention](/api/nodes/mention)                | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-mention/)         |
| [OrderedList](/api/nodes/ordered-list)       | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-ordered-list/)    |
| [Paragraph](/api/nodes/paragraph)            | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-paragraph/)       |
| [Table](/api/nodes/table)                    | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table/)           |
| [TableRow](/api/nodes/table-row)             | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table-row/)       |
| [TableCell](/api/nodes/table-cell)           | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table-cell/)      |
| [TaskList](/api/nodes/task-list)             | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-task-list/)       |
| [TaskItem](/api/nodes/task-item)             | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-task-item/)       |
| [Text](/api/nodes/text)                      | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text/)            |

## 新しいノートの作成

Tiptap 用に独自のノードを自由に作成できます。独自のノードを作成して登録するために必要な定型コードは次のとおりです。

<!-- You’re free to create your own nodes for Tiptap. Here is the boilerplate code that’s need to create and register your own node: -->

```js

const CustomNode = Node.create({
  // Your code here
})

const editor = new Editor({
  extensions: [
    // Register your custom node with the editor.
    CustomNode,
    // … and don’t forget all other extensions.
    Document,
    Paragraph,
    Text,
    // …
  ],
})
```

参考 [more about custom extensions in our guide](/guide/custom-extensions).



# Blockquote

[![Version](https://img.shields.io/npm/v/@tiptap/extension-blockquote.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-blockquote)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-blockquote.svg)](https://npmcharts.com/compare/@tiptap/extension-blockquote?minimal=true)

<!-- The Blockquote extension enables you to use the `<blockquote>` HTML tag in the editor. This is great to … show quotes in the editor, you know? -->

<!-- Type <code>>&nbsp;</code> at the beginning of a new line and it will magically transform to a blockquote. -->

Blockquote 拡張機能を使用すると、エディターで `<blockquote>` HTML タグを使用できます。エディタで引用符を表示するのに最適です。

新しい行の先頭に `>` と入力するとブロック引用符に変換されます。

## インストール

```bash
npm install @tiptap/extension-blockquote
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Blockquote.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setBlockquote()
<!-- Wrap content in a blockquote. -->

コンテンツをブロッククォートでラップします。

```js
editor.commands.setBlockquote()
```

### toggleBlockquote()
<!-- Wrap or unwrap a blockquote. -->

ブロッククォートをラップまたはアンラップします。

```js
editor.commands.toggleBlockquote()
```

### unsetBlockquote()
<!-- Unwrap a blockquote. -->

ブロッククォートをアンラップします。

```js
editor.commands.unsetBlockquote()
```

## キーボード ショートカット
| コマンド           | Windows/Linux                   | macOS                       |
| ----------------- | ------------------------------- | --------------------------- |
| Toggle Blockquote | `Ctrl` + `Shift` + `B` | `Cmd` + `Shift` + `B` |

## ソースコード
[packages/extension-blockquote/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-blockquote/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Blockquote



# BulletList
[![Version](https://img.shields.io/npm/v/@tiptap/extension-bullet-list.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-bullet-list)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-bullet-list.svg)](https://npmcharts.com/compare/@tiptap/extension-bullet-list?minimal=true)

<!-- This extension enables you to use bullet lists in the editor. They are rendered as `<ul>` HTML tags. -->

<!-- Type <code>*&nbsp;</code>, <code>-&nbsp;</code> or <code>+&nbsp;</code> at the beginning of a new line and it will magically transform to a bullet list. -->

この拡張機能を使用すると、エディターで箇条書きを使用できます。それらは `<ul>` HTML タグとしてレンダリングされます。

新しい行の先頭に `*`、`-`、または `+` と入力すると、魔法のように箇条書きに変換されます。

## インストール

```bash
npm install @tiptap/extension-bullet-list @tiptap/extension-list-item
```

<!-- This extension requires the [`ListItem`](/api/nodes/list-item) node. -->

この拡張機能には、[`ListItem`](/api/nodes/list-item) ノードが必要で

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
BulletList.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### itemTypeName
<!-- Specify the list item name. -->

リスト項目名を指定します。

Default: `'listItem'`

```js
BulletList.configure({
  itemTypeName: 'listItem',
})
```

## コマンド

### toggleBulletList()
<!-- Toggles a bullet list. -->

箇条書きを切り替えます。

```js
editor.commands.toggleBulletList()
```

## キーボードショートカット

| コマンド          | Windows/Linux                   | macOS                       |
| ---------------- | ------------------------------- | --------------------------- |
| toggleBulletList | `Ctrl` + `Shift` + `8` | `Cmd` + `Shift` + `8` |

## ソースコード

[packages/extension-bullet-list/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bullet-list/)

## 使い方

https://embed.tiptap.dev/preview/Nodes/BulletList



# CodeBlock
[![Version](https://img.shields.io/npm/v/@tiptap/extension-code-block.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-code-block)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-code-block.svg)](https://npmcharts.com/compare/@tiptap/extension-code-block?minimal=true)

<!-- With the CodeBlock extension you can add fenced code blocks to your documents. It’ll wrap the code in `<pre>` and `<code>` HTML tags. -->

<!-- Type <code>&grave;&grave;&grave;&nbsp;</code> (three backticks and a space) or <code>&Tilde;&Tilde;&Tilde;&nbsp;</code> (three tildes and a space) and a code block is instantly added for you. You can even specify the language, try writing <code>&grave;&grave;&grave;css&nbsp;</code>. That should add a `language-css` class to the `<code>`-tag. -->

<!-- ::: warning No syntax highlighting -->
<!-- The CodeBlock extension doesn’t come with styling and has no syntax highlighting built-in. Try the [CodeBlockLowlight](/api/nodes/code-block-lowlight) extension if you’re looking for code blocks with syntax highlighting. -->
<!-- ::: -->

CodeBlock 拡張機能を使用すると、フェンスで囲まれたコードブロックをドキュメントに追加できます。コードを `<pre>` および `<code>` HTML タグでラップします。

<code>&grave;&grave;&grave;&nbsp;</code>（3つのチルダとスペース）または <code>&Tilde;&Tilde;&Tilde;&nbsp;</code>（3つのチルダとスペース）とコードブロックを入力しますすぐに追加されます。言語を指定することもできます。<code>&grave;&grave;&grave;css&nbsp;</code> を書いてみてください。これにより、`language-css`クラスが `<code>` タグに追加されます。

> 警告：**構文の強調表示なし**
CodeBlock 拡張機能にはスタイリングが付属しておらず、構文の強調表示も組み込まれていません。構文が強調表示されたコードブロックを探している場合は、[CodeBlockLowlight](/api/nodes/code-block-lowlight) 拡張機能を試してください。

## インストール
```bash
npm install @tiptap/extension-code-block
```

## 設定

### languageClassPrefix
<!-- Adds a prefix to language classes that are applied to code tags. -->

コードタグに適用される言語クラスにプレフィックスを追加します。

Default: `'language-'`

```js
CodeBlock.configure({
  languageClassPrefix: 'language-',
})
```

### exitOnTripleEnter
<!-- Define whether the node should be exited on triple enter. -->

トリプルエンターでノードを終了するかどうかを定義します。

Default: `true`

```js
CodeBlock.configure({
  exitOnTripleEnter: false,
})
```

### exitOnArrowDown
<!-- Define whether the node should be exited on arrow down if there is no node after it. -->

後にノードがない場合に、下向き矢印でノードを終了するかどうかを定義します。

Default: `true`

```js
CodeBlock.configure({
  exitOnArrowDown: false,
})
```

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
CodeBlock.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setCodeBlock()
<!-- Wrap content in a code block. -->

コンテンツをコードブロックでラップします。

```js
editor.commands.setCodeBlock()
```

### toggleCodeBlock()
<!-- Toggle the code block. -->

コードブロックを切り替えます。

```js
editor.commands.toggleCodeBlock()
```

## キーボードショートカット
| コマンド         | Windows/Linux                 | macOS                     |
| --------------- | ----------------------------- | ------------------------- |
| toggleCodeBlock | `Control`&nbsp;`Alt`&nbsp;`C` | `Cmd`&nbsp;`Alt`&nbsp;`C` |

## ソースコード
[packages/extension-code-block/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code-block/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/CodeBlock



# CodeBlockLowlight
[![Version](https://img.shields.io/npm/v/@tiptap/extension-code-block-lowlight.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-code-block-lowlight)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-code-block-lowlight.svg)](https://npmcharts.com/compare/@tiptap/extension-code-block-lowlight?minimal=true)

<!-- With the CodeBlockLowlight extension you can add fenced code blocks to your documents. It’ll wrap the code in `<pre>` and `<code>` HTML tags. -->

<!-- ::: warning Syntax highlight dependency
This extension relies on the [lowlight](https://github.com/wooorm/lowlight) library to apply syntax highlight to the code block’s content.
::: -->

<!-- Type <code>&grave;&grave;&grave;&nbsp;</code> (three backticks and a space) or <code>&Tilde;&Tilde;&Tilde;&nbsp;</code> (three tildes and a space) and a code block is instantly added for you. You can even specify the language, try writing <code>&grave;&grave;&grave;css&nbsp;</code>. That should add a `language-css` class to the `<code>`-tag. -->

CodeBlockLowlight 拡張機能を使用すると、フェンスで囲まれたコードブロックをドキュメントに追加できます。コードを `<pre>` および `<code>` HTML タグでラップします。

> 警告：**構文ハイライト依存関係**
この拡張機能は、[lowlight](https://github.com/wooorm/lowlight) ライブラリに依存して、コードブロックのコンテンツに構文の強調表示を適用します。

<code>&grave;&grave;&grave;&nbsp;</code>（3つのチルダとスペース）または <code>&Tilde;&Tilde;&Tilde;&nbsp;</code>（3つのチルダとスペース）とコードブロックを入力しますすぐに追加されます。言語を指定することもできます。<code>&grave;&grave;&grave;css&nbsp;</code> を書いてみてください。これにより、`language-css` クラスが `<code>` タグに追加されます。

## インスト―ル
```bash
npm install lowlight @tiptap/extension-code-block-lowlight
```

## 設定

### lowlight

<!-- You should provide the `lowlight` module to this extension. Decoupling the `lowlight` package from the extension allows the client application to control which version of lowlight it uses and which programming language packages it needs to load. -->

この拡張機能に `lowlight` モジュールを提供する必要があります。 `lowlight` パッケージを拡張機能から切り離すことで、クライアントアプリケーションは、使用する lowlight のバージョンと、ロードする必要のあるプログラミング言語パッケージを制御できます。

```js

CodeBlockLowlight.configure({
  lowlight,
})
```

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタムHTML属性。

```js
CodeBlockLowlight.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### languageClassPrefix
<!-- Adds a prefix to language classes that are applied to code tags. -->

コードタグに適用される言語クラスにプレフィックスを追加します。

Default: `'language-'`

```js
CodeBlockLowlight.configure({
  languageClassPrefix: 'language-',
})
```

### defaultLanguage
<!-- Define a default language instead of the automatic detection of lowlight. -->

ローライトの自動検出ではなく、デフォルトの言語を定義します。

Default: `null`

```js
CodeBlockLowlight.configure({
  defaultLanguage: 'plaintext',
})
```

## コマンド

### setCodeBlock()
<!-- Wrap content in a code block. -->

コンテンツをコードブロックでラップします。

```js
editor.commands.setCodeBlock()
```

### toggleCodeBlock()
<!-- Toggle the code block. -->

コードブロックを切り替えます。

```js
editor.commands.toggleCodeBlock()
```

## キーボードショートカット
| コマンド         | Windows/Linux                 | macOS                     |
| --------------- | ----------------------------- | ------------------------- |
| toggleCodeBlock | `Control` + `Alt` + `C` | `Cmd` + `Alt` + `C` |

## ソースコード

[packages/extension-code-block-lowlight/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code-block-lowlight/)

## 使い方

https://embed.tiptap.dev/preview/Nodes/CodeBlockLowlight



# Document
[![Version](https://img.shields.io/npm/v/@tiptap/extension-document.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-document)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-document.svg)](https://npmcharts.com/compare/@tiptap/extension-document?minimal=true)

<!-- **The `Document` extension is required**, no matter what you build with Tiptap. It’s a so called “topNode”, a node that’s the home to all other nodes. Think of it like the `<body>` tag for your document. -->

<!-- The node is very tiny though. It defines a name of the node (`doc`), is configured to be a top node (`topNode: true`) and that it can contain multiple other nodes (`block+`). That’s all. But have a look yourself: -->

<!-- :::warning Breaking Change from 1.x → 2.x
tiptap 1 tried to hide that node from you, but it has always been there. You have to explicitly ::: -->

**Tiptap で何をビルドするかに関係なく、Document 拡張機能が必要です**。これはいわゆる "topNode" であり、他のすべてのノードのホームとなるノードです。ドキュメントの `<body>` タグのように考えてください。

ただし、ノードは非常に小さいです。ノードの名前 (`doc`) を定義し、最上位ノード (`topNode: true`) として構成され、他の複数のノード (`block+`) を含めることができます。

> 警告：**1.x→2.xからの重大な変更**
Tiptap 1はそのノードをあなたから隠そうとしましたが、それは常にそこにありました。今後は明示的にインポートする必要があります（または `StarterKit` を使用します）。

## インストール
```bash
npm install @tiptap/extension-document
```

## ソースコード
[packages/extension-document/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-document/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Document



# HardBreak
[![Version](https://img.shields.io/npm/v/@tiptap/extension-hard-break.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-hard-break)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-hard-break.svg)](https://npmcharts.com/compare/@tiptap/extension-hard-break?minimal=true)

<!-- The HardBreak extensions adds support for the `<br>` HTML tag, which forces a line break. -->

HardBreak 拡張機能は、改行を強制する `<br>` HTML タグのサポートを追加します。

## インストール
```bash
npm install @tiptap/extension-hard-break
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
HardBreak.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### keepMarks
<!-- Decides whether to keep marks after a line break. Based on the `keepOnSplit` option for marks. -->

改行後にマークを保持するかどうかを決定します。マークの `keepOnSplit` オプションに基づいています。

Default: `true`

```js
HardBreak.configure({
  keepMarks: false,
})
```

## コマンド

### setHardBreak()
<!-- Add a line break. -->

改行を追加します

```js
editor.commands.setHardBreak()
```

## キーボードショートカット
| コマンド      | Windows/Linux                                  | macOS                                      |
| ------------ | ---------------------------------------------- | ------------------------------------------ |
| setHardBreak | `Shift` + `Enter`<br>`Control` + `Enter` | `Shift` + `Enter`<br>`Cmd` + `Enter` |

## ソースコード
[packages/extension-hard-break/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-hard-break/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/HardBreak



# Hashtag

<!-- :::pro Fund the development ♥
We need your support to maintain, update, support and develop Tiptap. If you’re waiting for this extension, [become a sponsor and fund our work](/sponsor).
::: -->

> pro 開発資金♥
Tiptapを維持、更新、サポート、開発するには、あなたのサポートが必要です。 この延長を待っている場合は、[スポンサーになり、私たちの仕事に資金を提供してください](/sponsor)。


TODO



# Heading
[![Version](https://img.shields.io/npm/v/@tiptap/extension-heading.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-heading)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-heading.svg)](https://npmcharts.com/compare/@tiptap/extension-heading?minimal=true)

<!-- The Heading extension adds support for headings of different levels. Headings are rendered with `<h1>`, `<h2>`, `<h3>`, `<h4>`, `<h5>` or `<h6>` HTML tags. By default all six heading levels (or styles) are enabled, but you can pass an array to only allow a few levels. Check the usage example to see how this is done. -->

<!-- Type <code>#&nbsp;</code> at the beginning of a new line and it will magically transform to a heading, same for <code>##&nbsp;</code>, <code>###&nbsp;</code>, <code>####&nbsp;</code>, <code>#####&nbsp;</code> and <code>######&nbsp;</code>. -->

見出し拡張機能は、さまざまなレベルの見出しのサポートを追加します。見出しは、`<h1>`、`<h2>`、`<h3>`、`<h4>`、`<h5>`、または `<h6>` HTML タグでレンダリングされます。デフォルトでは、6つの見出しレベル（またはスタイル）すべてが有効になっていますが、配列を渡して、いくつかのレベルのみを許可することができます。使用例をチェックして、これがどのように行われるかを確認してください。

新しい行の先頭に **`#` に続けてスペースを入力する** と魔法のように見出しに変換されます。同じように <code>##&nbsp;</code>, <code>###&nbsp;</code>, <code>####&nbsp;</code>, <code>#####&nbsp;</code>, <code>######&nbsp;</code> も同様となります。

## インストール
```bash
npm install @tiptap/extension-heading
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Heading.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### levels
<!-- Specifies which heading levels are supported. -->

サポートされる見出しレベルを指定します。

Default: `[1, 2, 3, 4, 5, 6]`

```js
Heading.configure({
  levels: [1, 2],
})
```

## コマンド

### setHeading()
<!-- Creates a heading node with the specified level. -->

指定されたレベルで見出しノードを作成します。

```js
editor.commands.setHeading({ level: 1 })
```

### toggleHeading()
<!-- Toggles a heading node with the specified level. -->

指定されたレベルで見出しノードを切り替えます。

```js
editor.commands.toggleHeading({ level: 1 })
```

## キーボードショートカット
| コマンド                     | Windows/Linux                 | macOS                     |
| --------------------------- | ----------------------------- | ------------------------- |
| toggleHeading({ level: 1 }) | `Ctrl` + `Alt` + `1` | `Cmd` + `Alt` + `1` |
| toggleHeading({ level: 2 }) | `Ctrl` + `Alt` + `2` | `Cmd` + `Alt` + `2` |
| toggleHeading({ level: 3 }) | `Ctrl` + `Alt` + `3` | `Cmd` + `Alt` + `3` |
| toggleHeading({ level: 4 }) | `Ctrl` + `Alt` + `4` | `Cmd` + `Alt` + `4` |
| toggleHeading({ level: 5 }) | `Ctrl` + `Alt` + `5` | `Cmd` + `Alt` + `5` |
| toggleHeading({ level: 6 }) | `Ctrl` + `Alt` + `6` | `Cmd` + `Alt` + `6` |

## ソースコード
[packages/extension-heading/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-heading/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Heading



# HorizontalRule
[![Version](https://img.shields.io/npm/v/@tiptap/extension-horizontal-rule.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-horizontal-rule)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-horizontal-rule.svg)](https://npmcharts.com/compare/@tiptap/extension-horizontal-rule?minimal=true)

<!-- Use this extension to render a `<hr>` HTML tag. If you pass `<hr>` in the editor’s initial content, it’ll be rendered accordingly. -->

<!-- Type three dashes (<code>---</code>) or three underscores and a space (<code>___ </code>) at the beginning of a new line and it will magically transform to a horizontal rule. -->

この拡張機能を使用して、`<hr>` HTML タグをレンダリングします。エディタの最初のコンテンツで `<hr>` を渡すと、それに応じてレンダリングされます。

新しい行の先頭に3つのダッシュ (<code>---</code>) または3つのアンダースコアとスペース (<code>___ </code>) を入力すると、魔法のように水平方向のルールに変換されます。

## インストール
```bash
npm install @tiptap/extension-horizontal-rule
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
HorizontalRule.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setHorizontalRule()
<!-- Create a horizontal rule. -->

水平ルールを作成します。

```js
editor.commands.setHorizontalRule()
```

## ソースコード
[packages/extension-horizontal-rule/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-horizontal-rule/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/HorizontalRule



# Image
[![Version](https://img.shields.io/npm/v/@tiptap/extension-image.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-image)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-image.svg)](https://npmcharts.com/compare/@tiptap/extension-image?minimal=true)

<!-- Use this extension to render `<img>` HTML tags. By default, those images are blocks. If you want to render images in line with text  set the `inline` option to `true`. -->

<!-- :::warning Restrictions
This extension does only the rendering of images. It doesn’t upload images to your server, that’s a whole different story.
::: -->


この拡張機能を使用して、`<img>` HTML タグをレンダリングします。デフォルトでは、これらの画像はブロックです。テキストに沿って画像をレンダリングする場合は、`inline` オプションを `true` に設定します。

> 警告：**制限**
この拡張機能は、画像のレンダリングのみを行います。サーバーに画像をアップロードしません。これはまったく別の話です。

## インストール
```bash
npm install @tiptap/extension-image
```

## 設定

### inline
<!-- Renders the image node inline, for example in a paragraph tag: `<p><img src="spacer.gif"></p>`. By default images are on the same level as paragraphs. -->

<!-- It totally depends on what kind of editing experience you’d like to have, but can be useful if you (for example) migrate from Quill to Tiptap. -->

画像ノードをインラインでレンダリングします。たとえば、段落タグ `<p><img src="spacer.gif"></p>` を使用します。デフォルトでは、画像は段落と同じレベルにあります。

必要な編集エクスペリエンスの種類によって異なりますが、たとえば、Quill から Tiptap に移行する場合に役立ちます。

Default: `false`

```js
Image.configure({
  inline: true,
})
```

### allowBase64
Allow images to be parsed as base64 strings `<img src="data:image/jpg;base64...">`.

画像を base64 文字列 `<img src="data:image/jpg;base64...">` として解析できるようにします。

Default: `false`

```js
Image.configure({
  allowBase64: true,
})
```

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Image.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## Commands

### setImage()
<!-- Makes the current node an image. -->

現在のノードをイメージにします。

```js
editor.commands.setImage({ src: 'https://example.com/foobar.png' })
editor.commands.setImage({ src: 'https://example.com/foobar.png', alt: 'A boring example image', title: 'An example' })
```

## ソースコード
[packages/extension-image/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-image/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Image



# ListItem
[![Version](https://img.shields.io/npm/v/@tiptap/extension-list-item.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-list-item)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-list-item.svg)](https://npmcharts.com/compare/@tiptap/extension-list-item?minimal=true)

<!-- The ListItem extension adds support for the `<li>` HTML tag. It’s used for bullet lists and ordered lists and can’t really be used without them. -->

ListItem 拡張機能は、`<li>` HTML タグのサポートを追加します。箇条書きと順序付きリストに使用され、それらなしでは実際には使用できません。

## インストール
```bash
npm install @tiptap/extension-list-item
```

<!-- This extension requires the [`BulletList`](/api/nodes/bullet-list) or [`OrderedList`](/api/nodes/ordered-list) node. -->

この拡張機能には、[`BulletList`](/api/nodes/bullet-list) または [`OrderedList`](/api/nodes/ordered-list) ノードが必要です。

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
ListItem.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## キーボード ショートカット
| コマンド         | Windows/Linux      | macOS              |
| --------------- | ------------------ | ------------------ |
| splitListItem() | `Enter`            | `Enter`            |
| sinkListItem()  | `Tab`              | `Tab`              |
| liftListItem()  | `Shift` + `Tab` | `Shift` + `Tab` |

## ソースコード
[packages/extension-list-item/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-list-item/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/ListItem



# Mention
[![Version](https://img.shields.io/npm/v/@tiptap/extension-mention.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-mention)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-mention.svg)](https://npmcharts.com/compare/@tiptap/extension-mention?minimal=true)

Honestly, the mention node is amazing. It adds support for `@mentions`, for example to ping users, *and* provides full control over the rendering.

Literally everything can be customized. You can pass a custom component for the rendering.  All examples use `.filter()` to search through items, but feel free to send async queries to an API or add a more advanced library like [fuse.js](https://fusejs.io/) to your project.

正直なところ、`Mention` ノードは素晴らしいです。たとえば、 ping ユーザーに `@mentions` のサポートを追加するなど、レンダリングを完全に制御します。

文字通りすべてをカスタマイズすることができます。レンダリング用のカスタムコンポーネントを渡すことができます。すべての例で `.filter()` を使用してアイテムを検索しますが、非同期クエリをAPIに送信するか、[fuse.js](https://fusejs.io/) などのより高度なライブラリをプロジェクトに追加してください。

## インストール
```bash
npm install @tiptap/extension-mention
```

## 依存関係
<!-- To place the popups correctly, we’re using [tippy.js](https://atomiks.github.io/tippyjs/) in all our examples. You are free to bring your own library, but if you’re fine with it, just install what we use: -->

ポップアップを正しく配置するために、すべての例で [tippy.js](https://atomiks.github.io/tippyjs/) を使用しています。自分のライブラリを自由に持参できますが、問題がなければ、使用しているものをインストールするだけです。

```bash
npm install tippy.js
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Mention.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### renderLabel
<!-- Define how a mention label should be rendered. -->

メンションラベルのレンダリング方法を定義します。

```js
Mention.configure({
  renderLabel({ options, node }) {
    return `${options.suggestion.char}${node.attrs.label ?? node.attrs.id}`
  }
})
```

### 提案
[参照](/api/utilities/suggestion)

```js
Mention.configure({
  suggestion: {
    // …
  },
})
```

## Source code
[packages/extension-mention/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-mention/)

## Usage
https://embed.tiptap.dev/preview/Nodes/Mention



# OrderedList
[![Version](https://img.shields.io/npm/v/@tiptap/extension-ordered-list.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-ordered-list)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-ordered-list.svg)](https://npmcharts.com/compare/@tiptap/extension-ordered-list?minimal=true)

<!-- This extension enables you to use ordered lists in the editor. They are rendered as `<ol>` HTML tags. -->

<!-- Type <code>1.&nbsp;</code> (or any other number followed by a dot) at the beginning of a new line and it will magically transform to a ordered list. -->

この拡張機能を使用すると、エディターで順序付きリストを使用できます。それらは `<ol>` HTMLタグとしてレンダリングされます。

新しい行の先頭に <code>1.&nbsp;</code>（または他の数字の後にドットが続く）と入力すると、魔法のように順序付きリストに変換されます。

## インストール
```bash
npm install @tiptap/extension-ordered-list @tiptap/extension-list-item
```

<!-- This extension requires the [`ListItem`](/api/nodes/list-item) node. -->

この拡張機能には、[`ListItem`](/api/nodes/list-item) ノードが必要です。

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
OrderedList.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### itemTypeName
<!-- Specify the list item name. -->

リスト項目名を指定します。

Default: `'listItem'`

```js
OrderedList.configure({
  itemTypeName: 'listItem',
})
```

## コマンド

### toggleOrderedList()
<!-- Toggle an ordered list. -->

順序付きリストを切り替えます。

```js
editor.commands.toggleOrderedList()
```

## キーボード ショートカット
| コマンド | Windows/Linux                   | macOS                       |
| ----------------- | ------------------------------- | --------------------------- |
| toggleOrderedList | `Ctrl` + `Shift` + `7` | `Cmd` + `Shift` + `7` |

## ソースコード
[packages/extension-ordered-list/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-ordered-list/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/OrderedList



# Paragraph
[![Version](https://img.shields.io/npm/v/@tiptap/extension-paragraph.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-paragraph)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-paragraph.svg)](https://npmcharts.com/compare/@tiptap/extension-paragraph?minimal=true)

<!-- Yes, the schema is very strict. Without this extension you won’t even be able to use paragraphs in the editor. -->

<!-- :::warning Breaking Change from 1.x → 2.x
tiptap 1 tried to hide that node from you, but it has always been there. You have to explicitly ::: -->

スキーマは非常に厳密です。この拡張機能がないと、エディターで段落を使用することもできません。

> 警告：**1.x→2.xからの重大な変更**
Tiptap 1 はそのノードをあなたから隠そうとしましたが、それは常にそこにありました。今後は明示的にインポートする必要があります（または `StarterKit` を使用します）。

## インストール
```bash
npm install @tiptap/extension-paragraph
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Paragraph.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setParagraph()
<!-- Transforms all selected nodes to paragraphs. -->

選択したすべてのノードを段落に変換します。

```js
editor.commands.setParagraph()
```

## ショートカットキー
| コマンド        | Windows/Linux                 | macOS                     |
| -------------- | ----------------------------- | ------------------------- |
| setParagraph() | `Control`&nbsp;`Alt`&nbsp;`0` | `Cmd`&nbsp;`Alt`&nbsp;`0` |

## ソースコード
[packages/extension-paragraph/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-paragraph/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Paragraph



# Table

## Introduction
[![Version](https://img.shields.io/npm/v/@tiptap/extension-table.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-table)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-table.svg)](https://npmcharts.com/compare/@tiptap/extension-table?minimal=true)

<!-- Nothing is as much fun as a good old HTML table. The `Table` extension enables you to add this holy grail of WYSIWYG editing to your editor. -->

<!-- Don’t forget to add a `spacer.gif`. (Just joking. If you don’t know what that is, don’t listen.) -->

古き良き HTML テーブルほど楽しいものはありません。`Table` 拡張機能を使用すると、この WYSIWYG 編集の聖杯をエディターに追加できます。

`spacer.gif` を追加することを忘れないでください。（冗談です。それが何であるかわからない場合は、聞いてはいけません。）

## インストール

```bash
npm install @tiptap/extension-table @tiptap/extension-table-row @tiptap/extension-table-header @tiptap/extension-table-cell
```

<!-- This extension requires the [`TableRow`](/api/nodes/table-row), [`TableHeader`](/api/nodes/table-header) and [`TableCell`](/api/nodes/table-cell) nodes. -->

この拡張機能には、[`TableRow`](/api/nodes/table-row), [`TableHeader`](/api/nodes/table-header) and [`TableCell`](/api/nodes/table-cell) の各種ノードが必要です。

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Table.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### resizable
Default: `false`

### handleWidth
Default: `5`

### cellMinWidth
Default: `25`

### View
Default: `TableView`

### lastColumnResizable
Default: `true`

### allowTableNodeSelection
Default: `false`

## コマンド

### insertTable()
<!-- Creates a new table, with the specified number of rows and columns, and with a header row (if you tell it to). -->

指定された行数と列数、およびヘッダー行（指示された場合）を使用して、新しいテーブルを作成します。

```js
editor.commands.insertTable()
editor.commands.insertTable({ rows: 3, cols: 3, withHeaderRow: true })
```

### addColumnBefore()
<!-- Adds a column before the current column. -->

現在の列の前に列を追加します。

```js
editor.commands.addColumnBefore()
```

### addColumnAfter()
<!-- Adds a column after the current column. -->

現在の列の後に列を追加します。

```js
editor.commands.addColumnAfter()
```

### deleteColumn()
<!-- Deletes the current column. -->

現在の列を削除します。

```js
editor.commands.deleteColumn()
```

### addRowBefore()
<!-- Adds a row above the current row. -->

現在の行の上に行を追加します。

```js
editor.commands.addRowBefore()
```

### addRowAfter()
<!-- Adds a row below the current row. -->

現在の行の下に行を追加します。

```js
editor.commands.addRowAfter()
```

### deleteRow()
<!-- Deletes the current row. -->

現在の行を削除します。

```js
editor.commands.deleteRow()
```

### deleteTable()
<!-- Deletes the whole table. -->

テーブル全体を削除します。

```js
editor.commands.deleteTable()
```

### mergeCells()
<!-- Merge all selected cells to a single cell. -->

選択したすべてのセルを1つのセルに結合します。

```js
editor.commands.mergeCells()
```

### splitCell()
<!-- Splits the current cell. -->

現在のセルを分割します。

```js
editor.commands.splitCell()
```

### toggleHeaderColumn()
<!-- Makes the current column a header column. -->

現在の列をヘッダー列にします。

```js
editor.commands.toggleHeaderColumn()
```

### toggleHeaderRow()
<!-- Makes the current row a header row. -->

現在の行をヘッダー行にします。

```js
editor.commands.toggleHeaderRow()
```

### toggleHeaderCell()
<!-- Makes the current cell a header cell. -->

現在のセルをヘッダーセルにします。

```js
editor.commands.toggleHeaderCell()
```

### mergeOrSplit()
<!-- If multiple cells are selected, they are merged. If a single cell is selected, the cell is splitted into two cells. -->

複数のセルが選択されている場合、それらはマージされます。単一のセルが選択されている場合、セルは2つのセルに分割されます。

```js
editor.commands.mergeOrSplit()
```

### setCellAttribute()
<!-- Sets the given attribute for the current cell. Can be whatever you define on the [`TableCell`](/api/nodes/table-cell) extension, for example a background color. Just make sure to register [your custom attribute](/guide/custom-extensions#attributes) first. -->

現在のセルに指定された属性を設定します。[`TableCell`](/api/nodes/table-cell) 拡張機能で定義するものなら何でもかまいません。たとえば、背景色などです。必ず最初に [カスタム属性](/guide/custom-extensions#attributes) を登録してください。

```js
editor.commands.setCellAttribute('customAttribute', 'value')
editor.commands.setCellAttribute('backgroundColor', '#000')
```

### goToNextCell()
<!-- Go the next cell. -->

次のセルに移動します。

```js
editor.commands.goToNextCell()
```

### goToPreviousCell()
<!-- Go to the previous cell. -->

前のセルに移動します。

```js
editor.commands.goToPreviousCell()
```

### fixTables()
<!-- Inspects all tables in the document and fixes them, if necessary. -->

ドキュメント内のすべてのテーブルを検査し、必要に応じて修正します。

```js
editor.commands.fixTables()
```

## ソースコード
[packages/extension-table/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Table



# TableRow
[![Version](https://img.shields.io/npm/v/@tiptap/extension-table-row.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-table-row)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-table-row.svg)](https://npmcharts.com/compare/@tiptap/extension-table-row?minimal=true)

<!-- What’s a table without rows? Add this extension to make your tables usable. -->

行のないテーブルとは何ですか？ この拡張機能を追加して、テーブルを使用できるようにします。

## インストール
```bash
npm install @tiptap/extension-table @tiptap/extension-table-row @tiptap/extension-table-header @tiptap/extension-table-cell
```

<!-- This extension requires the [`Table`](/api/nodes/table), [`TableHeader`](/api/nodes/table-header) and [`TableCell`](/api/nodes/table-cell) nodes. -->

この拡張機能には、[`Table`](/api/nodes/table), [`TableHeader`](/api/nodes/table-header) 及び [`TableCell`](/api/nodes/table-cell) ノードが必要です 。

## ソースコード
[packages/extension-table-row/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table-row/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Table



# TableCell
[![Version](https://img.shields.io/npm/v/@tiptap/extension-table-cell.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-table-cell)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-table-cell.svg)](https://npmcharts.com/compare/@tiptap/extension-table-cell?minimal=true)

<!-- Don’t try to use tables without table cells. It won’t be fun. -->

テーブルセルのないテーブルを使用しようとしないでください。 面白くないでしょう。

## インストール
```bash
npm install @tiptap/extension-table @tiptap/extension-table-row @tiptap/extension-table-header @tiptap/extension-table-cell
```

This extension requires the [`Table`](/api/nodes/table), [`TableRow`](/api/nodes/table-row) and [`TableHeader`](/api/nodes/table-header) nodes.

## ソースコード
[packages/extension-table-cell/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table-cell/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Table



# TableHeader
[![Version](https://img.shields.io/npm/v/@tiptap/extension-table-header.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-table-header)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-table-header.svg)](https://npmcharts.com/compare/@tiptap/extension-table-header?minimal=true)

<!-- Table headers are optional. But come on, you want them, don’t you? If you don’t want them, update the `content` attribute of the [`TableRow`](/api/nodes/table-row) extension, like this: -->

テーブルヘッダーはオプションです。でもさあ、あなたはそれらが欲しいですよね？それらが不要な場合は、[`TableRow`](/api/nodes/table-row) 拡張機能の `content` 属性を次のように更新します。

```js
// Table rows without table headers
TableRow.extend({
  content: 'tableCell*',
})
```

<!-- This is the default, which allows table headers: -->

これはデフォルトであり、テーブルヘッダーを許可します。

```js
// Table rows with table headers (default)
TableRow.extend({
  content: '(tableCell | tableHeader)*',
})
```

## インストール
```bash
npm install @tiptap/extension-table @tiptap/extension-table-row @tiptap/extension-table-header @tiptap/extension-table-cell
```

<!-- This extension requires the [`Table`](/api/nodes/table), [`TableRow`](/api/nodes/table-row) and [`TableCell`](/api/nodes/table-cell) nodes. -->

この拡張機能には、[`Table`](/api/nodes/table), [`TableRow`](/api/nodes/table-row) 及び [`TableCell`](/api/nodes/table-cell) ノードが必要です。

## ソースコード
[packages/extension-table-header/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table-header/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Table



# TaskList
[![Version](https://img.shields.io/npm/v/@tiptap/extension-task-list.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-task-list)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-task-list.svg)](https://npmcharts.com/compare/@tiptap/extension-task-list?minimal=true)

<!-- This extension enables you to use task lists in the editor. They are rendered as `<ul data-type="taskList">`. This implementation doesn’t require any framework, it’s using Vanilla JavaScript only. -->

<!-- Type <code>[ ]&nbsp;</code> or <code>[x]&nbsp;</code> at the beginning of a new line and it will magically transform to a task list. -->

この拡張機能を使用すると、エディターでタスクリストを使用できます。それらは `<ul data-type="taskList">` としてレンダリングされます。この実装にはフレームワークは必要ありません。Vanilla JavaScript のみを使用しています。

新しい行の先頭に <code>[ ]&nbsp;</code> or <code>[x]&nbsp;</code> と入力すると、魔法のようにタスクリストに変換されます。

## インストール
```bash
npm install @tiptap/extension-task-list @tiptap/extension-task-item
```

<!-- This extension requires the [`TaskItem`](/api/nodes/task-item) extension. -->

この拡張機能には、[`TaskItem`](/api/nodes/task-item) 拡張機能が必要です。


## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
TaskList.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### itemTypeName
<!-- Specify the list item name. -->

リスト項目名を指定します。

Default: `'taskItem'`

```js
TaskList.configure({
  itemTypeName: 'taskItem',
})
```

## コマンド

# toggleTaskList()
<!-- Toggle a task list -->

タスクリストを切り替えます。.

```js
editor.commands.toggleTaskList()
```

## ショートカットキー
| コマンド          | Windows/Linux                   | macOS                       |
| ---------------- | ------------------------------- | --------------------------- |
| toggleTaskList() | `Control`&nbsp;`Shift`&nbsp;`9` | `Cmd`&nbsp;`Shift`&nbsp;`9` |

## ソースコード
[packages/extension-task-list/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-task-list/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/TaskList



# TaskItem

[![Version](https://img.shields.io/npm/v/@tiptap/extension-task-item.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-task-item)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-task-item.svg)](https://npmcharts.com/compare/@tiptap/extension-task-item?minimal=true)

<!-- This extension renders a task item list element, which is a `<li>` tag with a `data-type` attribute set to `taskItem`. It also renders a checkbox inside the list element, which updates a `checked` attribute. -->

<!-- This extension doesn’t require any JavaScript framework, it’s based on Vanilla JavaScript. -->

この拡張機能は、タスクアイテムリスト要素をレンダリングします。これは、`data-type` 属性が `taskItem` に設定された `<li>` タグです。また、list要素内にチェックボックスをレンダリングし、`checked` 属性を更新します。

この拡張機能は JavaScript フレームワークを必要とせず、Vanilla JavaScript に基づいています。

## インストール

```bash
npm install @tiptap/extension-task-list @tiptap/extension-task-item
```

<!-- This extension requires the [`TaskList`](/api/nodes/task-list) node. -->

この拡張機能には、[`TaskList`](/api/nodes/task-list) ノードが必要です。

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
TaskItem.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### nested

<!-- Whether the task items are allowed to be nested within each other. -->

タスクアイテムを相互にネストできるかどうか。

```js
TaskItem.configure({
  nested: true,
})
```

### onReadOnlyChecked

<!-- A handler for when the task item is checked or unchecked while the editor is set to `readOnly`. -->

<!-- If this is not supplied, the task items are immutable while the editor is `readOnly`. -->

<!-- If this function returns false, the check state will be preserved (`readOnly`). -->

エディターが `readOnly` に設定されているときに、タスク項目がオンまたはオフになっている場合のハンドラー。

これが指定されていない場合、エディターが `readOnly` である間、タスク項目は不変です。

この関数が false を返す場合、チェック状態は保持されます（ `readOnly`）。

```js
TaskItem.configure({
  onReadOnlyChecked: (node, checked) => {
    // do something
  },
})
```

## ショートカットキー

| コマンド         | Windows/Linux      | macOS              |
| --------------- | ------------------ | ------------------ |
| splitListItem() | `Enter`            | `Enter`            |
| sinkListItem()  | `Tab`              | `Tab`              |
| liftListItem()  | `Shift` + `Tab` | `Shift` + `Tab` |

## ソースコード

[packages/extension-task-item/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-task-item/)

## 使い方

https://embed.tiptap.dev/preview/Nodes/TaskItem



# Text
[![Version](https://img.shields.io/npm/v/@tiptap/extension-text.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-text)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-text.svg)](https://npmcharts.com/compare/@tiptap/extension-text?minimal=true)

<!-- **The `Text` extension is required**, at least if you want to work with text of any kind and that’s very likely. This extension is a little bit different, it doesn’t even render HTML. It’s plain text, that’s all. -->

<!-- :::warning Breaking Change from 1.x → 2.x
tiptap 1 tried to hide that node from you, but it has always been there. You have to explicitly ::: -->

**Text 拡張子が必要です**。少なくとも、あらゆる種類のテキストを処理する場合は、その可能性が非常に高くなります。この拡張機能は少し異なり、 HTML もレンダリングしません。プレーンテキストです、それだけです。

> 警告：**1.x→2.xからの重大な変更**
tiptap 1はそのノードをあなたから隠そうとしましたが、それは常にそこにありました。今後は明示的にインポートする必要があります 。(または `StarterKit` を使用します)

## インストール
```bash
npm install @tiptap/extension-text
```

## ソースコード
[packages/extension-text/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Text



# マーク

## はじめに

<!-- One or multiple marks can be applied to [nodes](/api/nodes), for example to add inline formatting like bold and italic, or other additional information. -->

[ノード](/api/nodes) に 1つまたは複数のマークを適用して、たとえば、太字や斜体などのインラインフォーマットやその他の追加情報を追加できます。

## サポートされているマークのリスト

| Title                                 | StarterKit ([view](/api/extensions/starter-kit)) | Source Code                                                                              |
| ------------------------------------- | ------------------------------------------------ | ---------------------------------------------------------------------------------------- |
| [Bold](/api/marks/bold)               | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bold/)        |
| [Code](/api/marks/code)               | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code/)        |
| [Highlight](/api/marks/highlight)     | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-highlight/)   |
| [Italic](/api/marks/italic)           | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-italic/)      |
| [Link](/api/marks/link)               | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-link/)        |
| [Strike](/api/marks/strike)           | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-strike/)      |
| [Subscript](/api/marks/subscript)     | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-subscript/)   |
| [Superscript](/api/marks/superscript) | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-superscript/) |
| [TextStyle](/api/marks/text-style)    | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text-style/)  |
| [Underline](/api/marks/underline)     | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-underline/)   |



# Bold

[![Version](https://img.shields.io/npm/v/@tiptap/extension-bold.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-bold)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-bold.svg)](https://npmcharts.com/compare/@tiptap/extension-bold?minimal=true)

<!-- Use this extension to render text in **bold**. If you pass `<strong>`, `<b>` tags, or text with inline `style` attributes setting the `font-weight` CSS rule in the editor’s initial content, they all will be rendered accordingly. -->

この拡張機能は、テキストを **太字** でレンダリングします。 `<strong>`、`<b>` タグ、またはインラインの  `style` 属性を持つテキストを渡して、エディターの初期コンテンツで `font-weight` CSS ルールを設定すると、それらはすべてそれに応じてレンダリングされます。

<!-- Type `**two asterisks**` or `__two underlines__` and it will magically transform to **bold** text while you type. -->

`** twoasterisks**` または `__twounderlines__` と入力すると、入力中に魔法のように **太字** のテキストに変換されます。

::: warning Restrictions
The extension will generate the corresponding `<strong>` HTML tags when reading contents of the `Editor` instance. All text marked bold, regardless of the method will be normalized to `<strong>` HTML tags.
:::

> **警告** ： 制限
拡張機能は、`Editor` インスタンスのコンテンツを読み取るときに対応する `<strong>` HTMLタグを生成します。メソッドに関係なく、太字でマークされたすべてのテキストは、`<strong>`HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-bold
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Bold.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setBold()
<!-- Mark text as bold. -->

テキストを太字でマークします。

```js
editor.commands.setBold()
```

### toggleBold()
<!-- Toggle the bold mark. -->

太字のマークを切り替えます。

```js
editor.commands.toggleBold()
```

### unsetBold()
<!-- Remove the bold mark. -->

太字のマークを削除します。

```js
editor.commands.unsetBold()
```

## キーボードショートカット
| コマンド      | Windows/Linux      | macOS          |
| ------------ | ------------------ | -------------- |
| toggleBold() | `Ctrl` + `B` | `Cmd` + `B` |

## ソースコード

[packages/extension-bold/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bold/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Bold



# Code

[![Version](https://img.shields.io/npm/v/@tiptap/extension-code.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-code)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-code.svg)](https://npmcharts.com/compare/@tiptap/extension-code?minimal=true)

<!-- The Code extensions enables you to use the `<code>` HTML tag in the editor. If you paste in text with `<code>` tags it will rendered accordingly. -->

<!-- Type something with <code>\`back-ticks around\`</code> and it will magically transform to `inline code` while you type. -->

コード拡張機能を使用すると、エディターで `<code>` HTML タグを使用できます。`<code>` タグを付けてテキストを貼り付けると、それに応じてレンダリングされます。

<code>\`back-ticks around\`</code> を使用して何かを入力すると、入力中に魔法のように `inline code` に変換されます。

## インストール

```bash
npm install @tiptap/extension-code
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Code.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## Commands

### setCode()
<!-- Mark text as inline code. -->

テキストをインラインコードとしてマークします。

```js
editor.commands.setCode()
```

### toggleCode()
<!-- Toggle inline code mark. -->

インラインコードマークを切り替えます。

```js
editor.commands.toggleCode()
```

### unsetCode()
<!-- Remove inline code mark. -->

インラインコードマークを削除します。

```js
editor.commands.unsetCode()
```

## キーボード ショートカット
| コマンド      | Windows/Linux      | macOS          |
| ------------ | ------------------ | -------------- |
| toggleCode() | `Ctrl` + `E` | `Cmd` + `E` |

## ソースコード

[packages/extension-code/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Code



# Highlight

[![Version](https://img.shields.io/npm/v/@tiptap/extension-highlight.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-highlight)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-highlight.svg)](https://npmcharts.com/compare/@tiptap/extension-highlight?minimal=true)

<!-- Use this extension to render highlighted text with `<mark>`. You can use only default `<mark>` HTML tag, which has a yellow background color by default, or apply different colors. -->

<!-- Type `==two equal signs==` and it will magically transform to <mark>highlighted</mark> text while you type. -->

この拡張機能は、強調表示されたテキストを `<mark>` でレンダリングします。デフォルトで黄色の背景色を持つデフォルトの `<mark>` HTML タグのみを使用するか、異なる色を適用できます。

`==two equal sign==`と入力すると、入力中に <mark >ハイライトされた</mark> テキストに魔法のように変換されます。

## インストール

```bash
npm install @tiptap/extension-highlight
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタムHTML属性。

```js
Highlight.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### multicolor
<!-- Add support for multiple colors. -->

複数の色のサポートを追加します。

Default: `false`

```js
Highlight.configure({
  multicolor: true,
})
```

## コマンド

### setHighlight()

<!-- Mark text as highlighted. -->

テキストを強調表示としてマークします。

```js
editor.commands.setHighlight()
editor.commands.setHighlight({ color: '#ffcc00' })
```

### toggleHighlight()
<!-- Toggle a text highlight. -->

テキストのハイライトを切り替えます。

```js
editor.commands.toggleHighlight()
editor.commands.toggleHighlight({ color: '#ffcc00' })
```

### unsetHighlight()
 <!-- Removes the highlight. -->

  ハイライトを削除します。

```js
editor.commands. unsetHighlight()
```


## キーボード ショートカット

| コマンド           | Windows/Linux                   | macOS                       |
| ----------------- | ------------------------------- | --------------------------- |
| toggleHighlight() | `Control` + `Shift` + `H` | `Cmd` + `Shift` + `H` |

## ソースコード
[packages/extension-highlight/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-highlight/)

## 使い方
https://embed.tiptap.dev/preview/Marks/Highlight



# Italic

[![Version](https://img.shields.io/npm/v/@tiptap/extension-italic.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-italic)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-italic.svg)](https://npmcharts.com/compare/@tiptap/extension-italic?minimal=true)

<!-- Use this extension to render text in *italic*. If you pass `<em>`, `<i>` tags, or text with inline `style` attributes setting `font-style: italic` in the editor’s initial content, they all will be rendered accordingly. -->

<!-- Type `*one asterisk*` or `_one underline_` and it will magically transform to *italic* text while you type. -->

この拡張機能は、テキストを *斜体* でレンダリングします。エディターの初期コンテンツで `<em>`、`<i>` タグ、またはインラインの `style` 属性が `font-style: italic` を設定しているテキストを渡すと、それらはすべてそれに応じてレンダリングされます。

`*oneasterisk*` または `_oneunderline_` と入力すると、入力中に魔法のように *斜体* のテキストに変換されます。

<!-- ::: warning Restrictions -->
<!-- The extension will generate the corresponding `<em>` HTML tags when reading contents of the `Editor` instance. All text marked italic, regardless of the method will be normalized to `<em>` HTML tags. -->

> 警告：制限
拡張機能は、`Editor` インスタンスのコンテンツを読み取るときに対応する `<em>` HTML タグを生成します。メソッドに関係なく、イタリックでマークされたすべてのテキストは、`<em>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-italic
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Italic.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setItalic()

<!-- Mark the text italic. -->

テキストを斜体でマークします。

```js
editor.commands.setItalic()
```

### toggleItalic()

<!-- Toggle the italic mark. -->

斜体のマークを切り替えます。

```js
editor.commands.toggleItalic()
```

### unsetItalic()

<!-- Remove the italic mark. -->

イタリックマークを削除します。

```js
editor.commands.unsetItalic()
```

## キーボードショートカット

| コマンド        | Windows/Linux      | macOS          |
| -------------- | ------------------ | -------------- |
| toggleItalic() | `Control` + `I` | `Cmd` + `I` |

## ソースコード

[packages/extension-italic/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-italic/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Italic



# Link

[![Version](https://img.shields.io/npm/v/@tiptap/extension-link.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-link)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-link.svg)](https://npmcharts.com/compare/@tiptap/extension-link?minimal=true)

<!-- The Link extension adds support for `<a>` tags to the editor. The extension is headless too, there is no actual UI to add, modify or delete links. The usage example below uses the native JavaScript prompt to show you how that could work. -->

<!-- In a real world application, you would probably add a more sophisticated user interface. -->

<!-- Pasted URLs will be transformed to links automatically. -->

Link 拡張機能は、エディターに `<a>` タグのサポートを追加します。拡張機能もヘッドレスであり、リンクを追加、変更、または削除するための実際のUIはありません。以下の使用例では、ネイティブ JavaScript プロンプトを使用して、それがどのように機能するかを示しています。

実際のアプリケーションでは、おそらくより洗練されたユーザーインターフェイスを追加します。

貼り付けられた URL は自動的にリンクに変換されます。

## インストール

```bash
npm install @tiptap/extension-link
```

## 設定

### protocols

<!-- Additional custom protocols you would like to be recognized as links. -->

リンクとして認識したい追加のカスタムプロトコル。

Default: `[]`

```js
Link.configure({
  protocols: ['ftp', 'mailto'],
})
```

### autolink

<!-- If enabled, it adds links as you type. -->

有効にすると、入力時にリンクが追加されます。

Default: `true`

```js
Link.configure({
  autolink: false,
})
```

### openOnClick

<!-- If enabled, links will be opened on click. -->

有効にすると、クリックするとリンクが開きます。

Default: `true`

```js
Link.configure({
  openOnClick: false,
})
```

### linkOnPaste

<!-- Adds a link to the current selection if the pasted content only contains an url. -->

貼り付けたコンテンツに URL のみが含まれている場合は、現在の選択へのリンクを追加します。

Default: `true`

```js
Link.configure({
  linkOnPaste: false,
})
```

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Link.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### validate

<!-- A function that validates every autolinked link. If it exists, it will be called with the link href as argument. If it returns `false`, the link will be removed. -->

<!-- Can be used to set rules for example excluding or including certain domains, tlds, etc. -->

自動リンクされたすべてのリンクを検証する関数。存在する場合は、リンク `href` を引数として呼び出されます。 `false` を返す場合、リンクは削除されます。

たとえば、特定のドメイン、TLD などを除外または含めるルールを設定するために使用できます。

```js
// only autolink urls with a protocol
Link.configure({
  validate: href => /^https?:\/\//.test(href),
})
```

## コマンド

### setLink()

<!-- Links the selected text. -->

選択したテキストをリンクします。

```js
editor.commands.setLink({ href: 'https://example.com' })
editor.commands.setLink({ href: 'https://example.com', target: '_blank' })
```

### toggleLink()

<!-- Adds or removes a link from the selected text. -->

選択したテキストにリンクを追加または削除します。

```js
editor.commands.toggleLink({ href: 'https://example.com' })
editor.commands.toggleLink({ href: 'https://example.com', target: '_blank' })
```

### unsetLink()

<!-- Removes a link. -->

リンクを削除します。

```js
editor.commands.unsetLink()
```

## キーボードショートカット

> 警告：キーボードショートカットはありません
この拡張機能は、特定のキーボードショートカットをバインドしません。ただし、おそらく `Mod-k` でカスタム UI を開くでしょう。

<!-- :::warning Doesn’t have a keyboard shortcut
This extension doesn’t bind a specific keyboard shortcut. You would probably open your custom UI on `Mod-k` though.
::: -->

## 現在の値の取得

[`getAttributes`](/api/editor#get-attributes) を使用して、現在設定されている属性（たとえば、どの href なのか）を見つけることができることをご存知ですか？ [コマンド](/api/commands)（状態を変更する）と混同しないでください。これは単なるメソッドです。これがどのように見えるかです：

<!-- Did you know that you can use [`getAttributes`](/api/editor#get-attributes) to find out which attributes, for example which href, is currently set? Don’t confuse it with a [command](/api/commands) (which changes the state), it’s just a method. Here is how that could look like: -->

```js
this.editor.getAttributes('link').href
```

## ソースコード

[packages/extension-link/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-link/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Link



# Strike

[![Version](https://img.shields.io/npm/v/@tiptap/extension-strike.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-strike)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-strike.svg)](https://npmcharts.com/compare/@tiptap/extension-strike?minimal=true)

<!-- Use this extension to render ~~striked text~~. If you pass `<s>`, `<del>`, `<strike>` tags, or text with inline `style` attributes setting `text-decoration: line-through` in the editor’s initial content, they all will be rendered accordingly. -->

<!-- Type <code>&Tilde;&Tilde;text between tildes&Tilde;&Tilde;</code> and it will be magically ~~striked through~~ while you type. -->

<!-- ::: warning Restrictions
The extension will generate the corresponding `<s>` HTML tags when reading contents of the `Editor` instance. All text striked through, regardless of the method will be normalized to `<s>` HTML tags.
::: -->

この拡張機能を使用して、~~打たれたテキスト~~ をレンダリングします。`<s>`、`<del>`、`<strike>` タグ、またはインラインの  `style` 属性で `text-decoration: line-through` を設定するテキストをエディターの初期コンテンツに渡すと、それらはすべて次のようになります。それに応じてレンダリングされます。

<code>&Tilde;&Tilde;text between tildes&Tilde;&Tilde;</code> と入力すると、入力中に魔法のように~~打たれます~~。

> 警告：制限
拡張機能は、`Editor` インスタンスのコンテンツを読み取るときに対応する `<s>` HTML タグを生成します。メソッドに関係なく、すべてのテキストは `<s>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-strike
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Strike.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setStrike()

<!-- Mark text as striked. -->

テキストをストライクとしてマークします。

```js
editor.commands.setStrike()
```

### toggleStrike()

<!-- Toggle strike mark. -->

ストライクマークを切り替えます。

```js
editor.commands.toggleStrike()
```

### unsetStrike()

<!-- Remove strike mark. -->

ストライクマークを削除します。

```js
editor.commands.unsetStrike()
```

## キーボード ショートカット
| コマンド | Windows/Linux                   | macOS                       |
| -------------- | ------------------------------- | --------------------------- |
| toggleStrike() | `Control` + `Shift` + `X` | `Cmd` + `Shift` + `X` |

## ソースコード
[packages/extension-strike/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-strike/)

## 使い方
https://embed.tiptap.dev/preview/Marks/Strike



# Subscript

[![Version](https://img.shields.io/npm/v/@tiptap/extension-subscript.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-subscript)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-subscript.svg)](https://npmcharts.com/compare/@tiptap/extension-subscript?minimal=true)

<!-- Use this extension to render text in <sub>subscript</sub>. If you pass `<sub>` or text with `vertical-align: sub` as inline style in the editor’s initial content, both will be normalized to a `<sub>` HTML tag. -->

この拡張機能を使用して、<sub>subscript</sub> のテキストをレンダリングします。エディターの初期コンテンツでインラインスタイルとして `<sub>` または `vertical-align: sub` を含むテキストを渡すと、両方とも `<sub>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-subscript
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Subscript.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setSubscript()

<!-- Mark text as subscript. -->

テキストを下付き文字としてマークします。

```js
editor.commands.setSubscript()
```

### toggleSubscript()

<!-- Toggle subscript mark. -->

下付き文字マークを切り替えます。

```js
editor.commands.toggleSubscript()
```

### unsetSubscript()

<!-- Remove subscript mark. -->

下付き文字を削除します。

```js
editor.commands.unsetSubscript()
```

## キーボード ショートカット

| コマンド           | Windows/Linux      | macOS          |
| ----------------- | ------------------ | -------------- |
| toggleSubscript() | `Ctrl` + `,` | `Cmd` + `,` |

## ソースコード

[packages/extension-subscript/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-subscript/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Subscript



# Superscript
[![Version](https://img.shields.io/npm/v/@tiptap/extension-superscript.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-superscript)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-superscript.svg)](https://npmcharts.com/compare/@tiptap/extension-superscript?minimal=true)

<!-- Use this extension to render text in <sup>superscript</sup>. If you pass `<sup>` or text with `vertical-align: super` as inline style in the editor’s initial content, both will be normalized to a `<sup>` HTML tag. -->

この拡張機能を使用して、<sup>上付き文字</sup> でテキストをレンダリングします。エディターの初期コンテンツでインラインスタイルとして `<sup>` または `vertical-align: super` を含むテキストを渡すと、両方とも `<sup>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-superscript
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Superscript.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setSuperscript()

<!-- Mark text as superscript. -->

テキストを上付き文字としてマークします。

```js
editor.commands.setSuperscript()
```

### toggleSuperscript()
<!-- Toggle superscript mark. -->

上付き文字マークを切り替えます。

```js
editor.commands.toggleSuperscript()
```

### unsetSuperscript()
<!-- Remove superscript mark. -->

上付き文字を削除します。

```js
editor.commands.unsetSuperscript()
```

## キーボード ショートカット

| コマンド             | Windows/Linux      | macOS          |
| ------------------- | ------------------ | -------------- |
| toggleSuperscript() | `Ctrl` + `.` | `Cmd` + `.` |

## ソースコード

[packages/extension-superscript/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-superscript/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Superscript



# TextStyle
[![Version](https://img.shields.io/npm/v/@tiptap/extension-text-style.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-text-style)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-text-style.svg)](https://npmcharts.com/compare/@tiptap/extension-text-style?minimal=true)

<!-- This mark renders a `<span>` HTML tag and enables you to add a list of styling related attributes, for example font-family, font-size, or color. The extension doesn’t add any styling attribute by default, but other extensions use it as the foundation, for example [`FontFamily`](/api/extensions/font-family) or [`Color`](/api/extensions/color). -->

このマークは `<span>` HTML タグをレンダリングし、フォントファミリ、フォントサイズ、色などのスタイル関連の属性のリストを追加できるようにします。拡張機能はデフォルトでスタイリング属性を追加しませんが、他の拡張機能はそれを基盤として使用します。たとえば、[`FontFamily`](/api/extensions/font-family) や [`Color`](/api/extensions/color) 。

## インストール

```bash
npm install @tiptap/extension-text-style
```

## コマンド

### removeEmptyTextStyle()
<!-- Remove `<span>` tags without an inline style. -->

インラインスタイルなしで `<span>` タグを削除します。

```js
editor.command.removeEmptyTextStyle()
```

## ソースコード

[packages/extension-text-style/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text-style/)

## 使い方

https://embed.tiptap.dev/preview/Marks/TextStyle



# Underline
[![Version](https://img.shields.io/npm/v/@tiptap/extension-underline.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-underline)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-underline.svg)](https://npmcharts.com/compare/@tiptap/extension-underline?minimal=true)

<!-- Use this extension to render text <u>underlined</u>. If you pass `<u>` tags, or text with inline `style` attributes setting `text-decoration: underline` in the editor’s initial content, they all will be rendered accordingly. -->

<!-- Be aware that underlined text in the Internet usually indicates that it’s a clickable link. Don’t confuse your users with underlined text. -->

この拡張機能を使用して、テキストを <u>下線付き</u> でレンダリングします。 `<u>` タグを渡すか、エディターの初期コンテンツで `text-decoration: underline` を設定するインライン ` style` 属性を持つテキストを渡すと、それらはすべてそれに応じてレンダリングされます。

インターネットで下線が引かれたテキストは、通常、クリック可能なリンクであることを示していることに注意してください。ユーザーを下線付きのテキストと混同しないでください。

<!-- ::: warning Restrictions
The extension will generate the corresponding `<u>` HTML tags when reading contents of the `Editor` instance. All text marked underlined, regardless of the method will be normalized to `<u>` HTML tags.
::: -->

> 警告：制限
拡張機能は、`Editor` インスタンスのコンテンツを読み取るときに対応する `<u>` HTML タグを生成します。メソッドに関係なく、下線付きでマークされたすべてのテキストは、`<u>` HTML タグに正規化されます。

## インストール

```bash
npm install @tiptap/extension-underline
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Underline.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setUnderline()

<!-- Marks a text as underlined. -->

テキストに下線付きのマークを付けます。

```js
editor.commands.setUnderline()
```

### toggleUnderline()

<!-- Toggles an underline mark. -->

下線マークを切り替えます。

```js
editor.commands.toggleUnderline()
```

### unsetUnderline()

<!-- Removes an underline mark. -->

下線マークを削除します。

```js
editor.commands.unsetUnderline()
```

## キーボード ショートカット

| コマンド           | Windows/Linux      | macOS          |
| ----------------- | ------------------ | -------------- |
| toggleUnderline() | `Ctrl` + `U` | `Cmd` + `U` |

## ソースコード

[packages/extension-underline/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-underline/)

## 使い方

https://embed.tiptap.dev/preview/Marks/Underline



# 拡張機能

## はじめに

<!-- Extensions add new capabilities to Tiptap and you’ll read the word extension here very often. Actually, there are literal Extensions. Those can’t add to the schema, but can add functionality or change the behaviour of the editor. -->

<!-- There are also some extensions with more capabilities. We call them [nodes](/api/nodes) and [marks](/api/marks) which can render content in the editor. -->

拡張機能は Tiptap に新しい機能を追加し、ここで拡張機能という言葉を頻繁に読みます。 実際には、文字通りの拡張機能があります。 これらはスキーマに追加できませんが、機能を追加したり、エディターの動作を変更したりすることはできます。

より多くの機能を備えたいくつかの拡張機能もあります。 これらを [nodes](/api/nodes) と [marks](/api/marks) と呼び、エディターでコンテンツをレンダリングできます。

## 提供されている拡張機能のリスト
| タイトル| StarterKit ([view](/api/extensions/starter-kit)) | ソースコード |
| ----------------------------------------------------------- | ------------------------------------------------ | ------------------------------------------------------------------------------------------------- |
| [BubbleMenu](/api/extensions/bubble-menu)                   | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bubble-menu/)          |
| [CharacterCount](/api/extensions/character-count)           | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-character-count/)      |
| [Collaboration](/api/extensions/collaboration)              | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration/)        |
| [CollaborationCursor](/api/extensions/collaboration-cursor) | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration-cursor/) |
| [Color](/api/extensions/color)                              | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-color/)                |
| [Dropcursor](/api/extensions/dropcursor)                    | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-dropcursor/)           |
| [FloatingMenu](/api/extensions/floating-menu)               | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-floating-menu/)        |
| [Focus](/api/extensions/focus)                              | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-focus/)                |
| [FontFamily](/api/extensions/font-family)                   | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-font-family/)          |
| [Gapcursor](/api/extensions/gapcursor)                      | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-gapcursor/)            |
| [History](/api/extensions/history)                          | Included                                         | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-history/)              |
| [Placeholder](/api/extensions/placeholder)                  | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-placeholder/)          |
| [StarterKit](/api/extensions/starter-kit)                   | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/starter-kit/)                    |
| [TextAlign](/api/extensions/text-align)                     | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text-align/)           |
| [UniqueID](/api/extensions/unique-id)                       | –                                                | Requires a Tiptap Pro subscription                                                                |
| [Typography](/api/extensions/typography)                    | –                                                | [GitHub](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-typography/)           |

<!-- You don’t have to use it, but we prepared a `@tiptap/starter-kit` which includes the most common extensions. Read more about [`StarterKit`](/guide/configuration#default-extensions). -->

使用する必要はありませんが、最も一般的な拡張機能を含む `@tiptap/starter-kit` を用意しました。 [`StarterKit`](/guide/configuration#default-extensions) の詳細をご覧ください。

## 拡張機能の仕組み

Tiptap は ProseMirror の複雑さのほとんどを隠そうとしますが、API の上に構築されているため、高度な使用法については [ProseMirrorガイド](https://ProseMirror.net/docs/guide/) を読むことをお勧めします。すべてが内部でどのように機能するかをよりよく理解し、Tiptap で使用される多くの用語や専門用語に慣れることができます。

既存の [nodes](/api/nodes), [marks](/api/marks) と [extensions](/api/extensions) は、独自の拡張機能にアプローチする方法について良い印象を与えることができます。ドキュメントとソースコードを簡単に切り替えることができるように、すべての拡張ドキュメントページから GitHub 上のファイルにリンクしました。

最初に既存の拡張機能をカスタマイズすることから始め、後で得た知識を使用して独自の拡張機能を作成することをお勧めします。そのため、以下の例はすべて既存の拡張機能を拡張していますが、すべての例は新しく作成された拡張機能でも機能します。

<!-- Although Tiptap tries to hide most of the complexity of ProseMirror, it’s built on top of its APIs and we recommend you to read through the [ProseMirror Guide](https://ProseMirror.net/docs/guide/) for advanced usage. You’ll have a better understanding of how everything works under the hood and get more familiar with many terms and jargon used by Tiptap. -->

<!-- Existing [nodes](/api/nodes), [marks](/api/marks) and [extensions](/api/extensions) can give you a good impression on how to approach your own extensions. To make it easier to switch between the documentation and the source code, we linked to the file on GitHub from every single extension documentation page. -->

<!-- We recommend to start with customizing existing extensions first, and create your own extensions with the gained knowledge later. That’s why all the below examples extend existing extensions, but all examples will work on newly created extensions aswell. -->

## 新しい拡張機能を作成します

Tiptap 用の独自の拡張機能を自由に作成できます。独自の拡張機能を作成して登録するために必要な定型コードは次のとおりです。

<!-- You’re free to create your own extensions for Tiptap. Here is the boilerplate code that’s need to create and register your own extension: -->

```js

const CustomExtension = Extension.create({
  // Your code here
})

const editor = new Editor({
  extensions: [
    // Register your custom extension with the editor.
    CustomExtension,
    // … and don’t forget all other extensions.
    Document,
    Paragraph,
    Text,
    // …
  ],
})
```

Learn [more about custom extensions in our guide](/guide/custom-extensions).




# Bubble Menu

[![Version](https://img.shields.io/npm/v/@tiptap/extension-bubble-menu.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-bubble-menu)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-bubble-menu.svg)](https://npmcharts.com/compare/@tiptap/extension-bubble-menu?minimal=true)

This extension will make a contextual menu appear near a selection of text. Use it to let users apply [marks](/api/marks) to their text selection.

As always, the markup and styling is totally up to you.

## Installation

```bash
npm install @tiptap/extension-bubble-menu
```

## Settings

### element

The DOM element that contains your menu.

Type: `HTMLElement`

Default: `null`

### tippyOptions

Under the hood, the `BubbleMenu` uses [tippy.js](https://atomiks.github.io/tippyjs/v6/all-props/). You can directly pass options to it.

Type: `Object`

Default: `{}`

### pluginKey

The key for the underlying ProseMirror plugin. Make sure to use different keys if you add more than one instance.

Type: `string | PluginKey`

Default: `'bubbleMenu'`

### shouldShow

A callback to control whether the menu should be shown or not.

Type: `(props) => boolean`

## Source code

[packages/extension-bubble-menu/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bubble-menu/)

## Usage

### JavaScript

```js

new Editor({
  extensions: [
    BubbleMenu.configure({
      element: document.querySelector('.menu'),
    }),
  ],
})
```

### Frameworks

https://embed.tiptap.dev/preview/Extensions/BubbleMenu

### Custom logic

Customize the logic for showing the menu with the `shouldShow` option. For components, `shouldShow` can be passed as a prop.

```js
BubbleMenu.configure({
  shouldShow: ({ editor, view, state, oldState, from, to }) => {
    // only show the bubble menu for images and links
    return editor.isActive('image') || editor.isActive('link')
  },
})
```

### Multiple menus

Use multiple menus by setting an unique `pluginKey`.

```js

new Editor({
  extensions: [
    BubbleMenu.configure({
      pluginKey: 'bubbleMenuOne',
      element: document.querySelector('.menu-one'),
    }),
    BubbleMenu.configure({
      pluginKey: 'bubbleMenuTwo',
      element: document.querySelector('.menu-two'),
    }),
  ],
})
```

Alternatively you can pass a ProseMirror `PluginKey`.

```js

new Editor({
  extensions: [
    BubbleMenu.configure({
      pluginKey: new PluginKey('bubbleMenuOne'),
      element: document.querySelector('.menu-one'),
    }),
    BubbleMenu.configure({
      pluginKey: new PluginKey('bubbleMenuTwo'),
      element: document.querySelector('.menu-two'),
    }),
  ],
})
```



# 文字カウント

[![Version](https://img.shields.io/npm/v/@tiptap/extension-character-count.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-character-count)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-character-count.svg)](https://npmcharts.com/compare/@tiptap/extension-character-count?minimal=true)

<!-- The `CharacterCount` extension limits the number of allowed character to a specific length. That’s it, that’s all. -->

`CharacterCount`拡張機能は、許可される文字数を特定の長さに制限します。

## インストール

```bash
npm install @tiptap/extension-character-count
```

## 設定

### 制限

<!-- The maximum number of characters that should be allowed. -->

許可する必要のある最大文字数。

Default: `null`

```js
CharacterCount.configure({
  limit: 240,
})
```

### モード

<!-- The mode by which the size is calculated. -->

サイズが計算されるモード。

Default: `'textSize'`

```js
CharacterCount.configure({
  mode: 'nodeSize',
})
```

## ストレージ

### characters()

<!-- Get the number of characters for the current document. -->

現在のドキュメントの文字数を取得します。

```js
editor.storage.characterCount.characters()

// Get the size of a specific node.
editor.storage.characterCount.characters({ node: someCustomNode })

// Overwrite the default `mode`.
editor.storage.characterCount.characters({ mode: 'nodeSize' })
```

### words()

<!-- Get the number of words for the current document. -->

現在のドキュメントの単語数を取得します。

```js
editor.storage.characterCount.words()

// Get the number of words for a specific node.
editor.storage.characterCount.words({ node: someCustomNode })
```

## ソースコード

[packages/extension-character-count/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-character-count/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/CharacterCount



# コラボレーション

[![Version](https://img.shields.io/npm/v/@tiptap/extension-collaboration.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-collaboration)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-collaboration.svg)](https://npmcharts.com/compare/@tiptap/extension-collaboration?minimal=true)

<!-- The Collaboration extension enables you to collaborate with others in a single document. The implementation is based on [Y.js by Kevin Jahns](https://github.com/yjs/yjs), which is the coolest thing to [integrate collaborative editing](/guide/collaborative-editing) in your project. -->

<!-- The history works totally different in a collaborative editing setup. If you undo a change, you don’t want to undo changes of other users. To handle that behaviour this extension provides an own `undo` and `redo` command. Don’t load the default [`History`](/api/extensions/history) extension together with the Collaboration extension to avoid conflicts. -->

コラボレーション拡張機能を使用すると、1つのドキュメントで他のユーザーとコラボレーションできます。実装は [Y.jsbyKevin Jahns](https://github.com/yjs/yjs) に基づいています。これは、プロジェクトで [コラボ編集の統合](/guide/collaborative-editing) の最も優れた機能です。

協調編集の設定では、履歴はまったく異なります。変更を元に戻す場合、他のユーザーの変更を元に戻す必要はありません。この動作を処理するために、この拡張機能は独自の `undo` および `redo` コマンドを提供します。競合を避けるために、デフォルトの [`History`](/api/extensions/history) 拡張機能をCollaboration拡張機能と一緒にロードしないでください。

<!-- :::pro Pro Extension
We kindly ask you to [sponsor our work](/sponsor) when using this extension in production.
::: -->

> **proPro拡張機能**
この拡張機能を本番環境で使用する場合は、[私たちの仕事のスポンサー](/sponsor) にお願いします。

## インストール

```bash
npm install @tiptap/extension-collaboration yjs y-websocket
```

## 設定

### ドキュメント

<!-- An initialized Y.js document. -->

初期化された Y.js ドキュメント。

Default: `null`

```js
Collaboration.configure({
  document: new Y.Doc(),
})
```

### フィールド

<!-- Name of a Y.js fragment, can be changed to sync multiple fields with one Y.js document. -->

Y.js フラグメントの名前は、複数のフィールドを 1つの Y.js ドキュメントと同期するように変更できます。

Default: `'default'`

```js
Collaboration.configure({
  document: new Y.Doc(),
  field: 'title',
})
```

### フラグメント

生の Y.js フラグメントは、`document` と `field` の代わりに使用できます。

<!-- A raw Y.js fragment, can be used instead of `document` and `field`. -->

Default: `null`

```js
Collaboration.configure({
  fragment: new Y.Doc().getXmlFragment('body'),
})
```

## コマンド

`Collboration` 拡張機能には、独自の履歴拡張機能が付属しています。`StarterKit` を使用している場合は、必ずデフォルトの拡張機能を無効にしてください。

<!-- The `Collboration` extension comes with its own history extension. Make sure to disable the default extension, if you’re working with the `StarterKit`. -->

### undo()

<!-- Undo the last change. -->

最後の変更を元に戻します。

```js
editor.commands.undo()
```
### redo()

<!-- Redo the last change. -->

最後の変更をやり直します。

```js
editor.commands.redo()
```

## キーボード ショートカット

| コマンド | Windows / Linux                                         | macOS                                         |
| ------- | ----------------------------------------------------- | --------------------------------------------- |
| undo()  | `Ctrl`&nbsp;+&nbsp;`Z`                                    | `Cmd`&nbsp;+&nbsp;`Z`                                |
| redo()  | `Shift`&nbsp;+&nbsp;`Ctrl`&nbsp;+&nbsp;`Z`<br>`Ctrl`&nbsp;+&nbsp;`Y` | `Shift`&nbsp;+&nbsp;`Cmd`&nbsp;+&nbsp;`Z`<br>`Cmd`&nbsp;+&nbsp;`Y` |

## ソースコード

[packages/extension-collaboration/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration/)

## 使い方

<!-- :::warning Public
The content of this editor is shared with other users.
::: -->

> **警告**
このエディタの内容は他のユーザーと共有されます。

https://embed.tiptap.dev/preview/Extensions/Collaboration?hideSource
https://embed.tiptap.dev/preview/Extensions/Collaboration



# コラボ編集のカーソル

[![Version](https://img.shields.io/npm/v/@tiptap/extension-collaboration-cursor.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-collaboration-cursor)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-collaboration-cursor.svg)](https://npmcharts.com/compare/@tiptap/extension-collaboration-cursor?minimal=true)

<!-- This extension adds information about all connected users (like their name and a specified color), their current cursor position and their text selection (if there’s one). -->

<!-- Open this page in multiple browser windows to test it. -->

この拡張機能は、接続されているすべてのユーザー（名前や指定された色など）、現在のカーソル位置、およびテキスト選択（存在する場合）に関する情報を追加します。

このページを複数のブラウザウィンドウで開いてテストします。

<!-- :::pro Pro Extension
We kindly ask you to [sponsor our work](/sponsor) when using this extension in production.
::: -->

> pro Pro 拡張機能

> この拡張機能を本番環境で使用する場合は、[私たちの仕事のスポンサー](/sponsor) にお願いします。

## インストール

```bash
npm install @tiptap/extension-collaboration-cursor
```

<!-- This extension requires the [`Collaboration`](/api/extensions/collaboration) extension. -->

この拡張機能には、[`Collaboration`](/api/extensions/collaboration) 拡張機能が必要です。

## 設定

### プロバイダー

A Y.js network provider, for example a [y-websocket](https://github.com/yjs/y-websocket) instance.

Y.js ネットワークプロバイダー。たとえば、[y-websocket](https://github.com/yjs/y-websocket) インスタンス。

Default: `null`

### ユーザー

<!-- Attributes of the current user, assumes to have a name and a color, but can be used with any attribute. The values are synced with all other connected clients. -->

現在のユーザーの属性は、名前と色を想定していますが、任意の属性で使用できます。値は、接続されている他のすべてのクライアントと同期されます。

Default: `{ user: null, color: null }`

### レンダー

<!-- A render function for the cursor, look at [the extension source code](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration-cursor/) for an example. -->

カーソルのレンダリング関数。例については、[拡張ソースコード](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration-cursor/) を参照してください。

## コマンド

### updateUser()

<!-- Pass an object with updated attributes of the current user. It expects a `name` and a `color`, but you can add additional fields, too. -->

現在のユーザーの属性が更新されたオブジェクトを渡します。`name` と `color` を想定していますが、フィールドを追加することもできます。

```js
editor.commands.updateUser({
  name: 'John Doe',
  color: '#000000',
  avatar: 'https://unavatar.io/github/ueberdosis',
})
```

## ソースコード

[packages/extension-collaboration-cursor/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-collaboration-cursor/)

## 使い方

<!-- :::warning Public
The content of this editor is shared with other users.
::: -->

> このエディタの内容は他のユーザーと共有されます。

https://embed.tiptap.dev/preview/Extensions/CollaborationCursor?hideSource
https://embed.tiptap.dev/preview/Extensions/CollaborationCursor



# Color
[![Version](https://img.shields.io/npm/v/@tiptap/extension-color.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-color)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-color.svg)](https://npmcharts.com/compare/@tiptap/extension-color?minimal=true)

<!-- This extension enables you to set the font color in the editor. It uses the [`TextStyle`](/api/marks/text-style) mark, which renders a `<span>` tag (and only that). The font color is applied as inline style then, for example `<span style="color: #958DF1">`. -->

この拡張機能を使用すると、エディターでフォントの色を設定できます。 [`TextStyle`](/api/marks/text-style) マークを使用して、`<span>`タグ（およびそれのみ）をレンダリングします。次に、フォントの色がインラインスタイルとして適用されます（例：`<span style="color: #958DF1">`）。

## インストール

```bash
npm install @tiptap/extension-text-style @tiptap/extension-color
```

This extension requires the [`TextStyle`](/api/marks/text-style) mark.

この拡張機能には、[`TextStyle`](/api/marks/text-style) マークが必要です。

## 設定

### types

<!-- A list of marks to which the color attribute should be applied to. -->

color 属性を適用する必要があるマークのリスト。

Default: `['textStyle']`

```js
Color.configure({
  types: ['textStyle'],
})
```

## コマンド

### setColor()

<!-- Applies the given font color as inline style. -->

指定されたフォントの色をインラインスタイルとして適用します。

```js
editor.commands.setColor('#ff0000')
```

### unsetColor()

<!-- Removes any font color. -->

フォントの色を削除します。

```js
editor.commands.unsetColor()
```

## ソースコード

[packages/extension-color/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-color/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Color



# ドロップカーソル

[![Version](https://img.shields.io/npm/v/@tiptap/extension-dropcursor.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-dropcursor)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-dropcursor.svg)](https://npmcharts.com/compare/@tiptap/extension-dropcursor?minimal=true)

This extension loads the [ProseMirror Dropcursor plugin](https://github.com/ProseMirror/prosemirror-dropcursor) by Marijn Haverbeke, which shows a cursor at the drop position when something is dragged into the editor.

Note that Tiptap is headless, but the dropcursor needs CSS for its appearance. There are settings for the color and width, and you’re free to add a custom CSS class.

## インストール

```bash
npm install @tiptap/extension-dropcursor
```

## 設定

### color

<!-- Color of the dropcursor. -->

ドロップカーソルの色。

Default: `'currentcolor'`

```js
Dropcursor.configure({
  color: '#ff0000'
})
```

### width

<!-- Width of the dropcursor. -->

ドロップカーソルの幅。

Default: `1`

```js
Dropcursor.configure({
  width: 2,
})
```

### class

<!-- One or multiple CSS classes that should be applied to the dropcursor. -->

ドロップカーソルに適用する必要がある1つまたは複数のCSSクラス。

```js
Dropcursor.configure({
  class: 'my-custom-class',
})
```

## ソースコード

[packages/extension-dropcursor/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-dropcursor/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Dropcursor



# フローティングメニュー

[![Version](https://img.shields.io/npm/v/@tiptap/extension-floating-menu.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-floating-menu)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-floating-menu.svg)](https://npmcharts.com/compare/@tiptap/extension-floating-menu?minimal=true)

<!-- This extension will make a contextual menu appear near a selection of text. -->

この拡張機能により、選択したテキストの近くにコンテキストメニューが表示されます。

## インストール

```bash
npm install @tiptap/extension-floating-menu
```

## 設定

### element

<!-- The DOM element that contains your menu. -->

メニューを含むDOM要素。

Type: `HTMLElement`

Default: `null`

### tippyOptions

<!-- Under the hood, the `FloatingMenu` uses [tippy.js](https://atomiks.github.io/tippyjs/v6/all-props/). You can directly pass options to it. -->

内部的には、`FloatingMenu` は [tippy.js](https://atomiks.github.io/tippyjs/v6/all-props/) を使用します。オプションを直接渡すことができます。

Type: `Object`

Default: `{}`

### pluginKey

<!-- The key for the underlying ProseMirror plugin. Make sure to use different keys if you add more than one instance. -->

基盤となる ProseMirror プラグインのキー。複数のインスタンスを追加する場合は、必ず異なるキーを使用してください。

Type: `string | PluginKey`

Default: `'floatingMenu'`

### shouldShow

<!-- A callback to control whether the menu should be shown or not. -->

メニューを表示するかどうかを制御するためのコールバック。

Type: `(props) => boolean`

## ソースコード

[packages/extension-floating-menu/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-floating-menu/)

## Vanilla JavaScript の使用

```js

new Editor({
  extensions: [
    FloatingMenu.configure({
      element: document.querySelector('.menu'),
    }),
  ],
})
```

## フレームワークの使用

https://embed.tiptap.dev/preview/Extensions/FloatingMenu

### カスタムロジック

`shouldShow` オプションを使用してメニューを表示するためのロジックをカスタマイズします。コンポーネントの場合、`shouldShow` を小道具として渡すことができます。

<!-- Customize the logic for showing the menu with the `shouldShow` option. For components, `shouldShow` can be passed as a prop. -->

```js
FloatingMenu.configure({
  shouldShow: ({ editor, view, state, oldState }) => {
    // show the floating within any paragraph
    return editor.isActive('paragraph')
  },
})
```

### 複数のメニュー

<!-- Use multiple menus by setting an unique `pluginKey`. -->

一意の `pluginKey` を設定して、複数のメニューを使用します。

```js

new Editor({
  extensions: [
    FloatingMenu.configure({
      pluginKey: 'floatingMenuOne',
      element: document.querySelector('.menu-one'),
    }),
    FloatingMenu.configure({
      pluginKey: 'floatingMenuTwo',
      element: document.querySelector('.menu-two'),
    }),
  ],
})
```

<!-- Alternatively you can pass a ProseMirror `PluginKey`. -->

または、ProseMirror `PluginKey` を渡すこともできます。

```js

new Editor({
  extensions: [
    FloatingMenu.configure({
      pluginKey: new PluginKey('floatingMenuOne'),
      element: document.querySelector('.menu-one'),
    }),
    FloatingMenu.configure({
      pluginKey: new PluginKey('floatingMenuOne'),
      element: document.querySelector('.menu-two'),
    }),
  ],
})
```



# フォーカス

[![Version](https://img.shields.io/npm/v/@tiptap/extension-focus.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-focus)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-focus.svg)](https://npmcharts.com/compare/@tiptap/extension-focus?minimal=true)

<!-- The Focus extension adds a CSS class to focused nodes. By default it adds `.has-focus`, but you can change that. -->

<!-- Note that it’s only a class, the styling is totally up to you. The usage example below has some CSS for that class. -->

Focus 拡張機能は、フォーカスされたノードに CSS クラスを追加します。デフォルトでは `.has-focus` が追加されますが、これは変更できます。

これはクラスにすぎないことに注意してください。スタイリングは完全にあなた次第です。以下の使用例には、そのクラスの CSS がいくつかあります。

## インストール

```bash
npm install @tiptap/extension-focus
```

## 設定

### className

<!-- The class that is applied to the focused element. -->

フォーカスされた要素に適用されるクラス。

Default: `'has-focus'`

```js
Focus.configure({
  className: 'focus',
})
```

### mode

<!-- Apply the class to `'all'`, the `'shallowest'` or the `'deepest'` node. -->

クラスを `'all'`、`'shallowest'`、または `'deepest'` ノードに適用します。

Default: `'all'`

```js
Focus.configure({
  mode: 'deepest',
})
```

## ソースコード

[packages/extension-focus/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-focus/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Focus



# フォントファミリー

[![Version](https://img.shields.io/npm/v/@tiptap/extension-font-family.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-font-family)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-font-family.svg)](https://npmcharts.com/compare/@tiptap/extension-font-family?minimal=true)

<!-- This extension enables you to set the font family in the editor. It uses the [`TextStyle`](/api/marks/text-style) mark, which renders a `<span>` tag. The font family is applied as inline style, for example `<span style="font-family: Arial"`. -->

この拡張機能を使用すると、エディターでフォントファミリーを設定できます。[`TextStyle`](/api/marks/text-style) マークを使用して、`<span>` タグをレンダリングします。フォントファミリーはインラインスタイルとして適用されます（例：`<span style="font-family: Arial">`）。

## インストール

```bash
npm install @tiptap/extension-text-style @tiptap/extension-font-family
```

<!-- This extension requires the [`TextStyle`](/api/marks/text-style) mark. -->

この拡張機能には、[`TextStyle`](/api/marks/text-style) マークが必要です。

## 設定

### types

<!-- A list of marks to which the font family attribute should be applied to. -->

フォントファミリー属性を適用するマークのリスト。

Default: `['textStyle']`

```js
FontFamily.configure({
  types: ['textStyle'],
})
```

## コマンド

### setFontFamily()

<!-- Applies the given font family as inline style. -->

指定されたフォントファミリをインラインスタイルとして適用します。

```js
editor.commands.setFontFamily('Inter')
```

### unsetFontFamily()

<!-- Removes any font family. -->

フォントファミリーを削除します。

```js
editor.commands.unsetFontFamily()
```

## ソースコード

[packages/extension-font-family/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-font-family/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/FontFamily



# Gapcursor

[![Version](https://img.shields.io/npm/v/@tiptap/extension-gapcursor.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-gapcursor)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-gapcursor.svg)](https://npmcharts.com/compare/@tiptap/extension-gapcursor?minimal=true)

<!-- This extension loads the [ProseMirror Gapcursor plugin](https://github.com/ProseMirror/prosemirror-gapcursor) by Marijn Haverbeke, which adds a gap for the cursor in places that don’t allow regular selection. For example, after a table at the end of a document. -->

Note that Tiptap is headless, but the gapcursor needs CSS for its appearance. The [default CSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) is loaded through the Editor class.

この拡張機能は、Marijn Haverbeke による[ProseMirrorGapcursor プラグイン](https://github.com/ProseMirror/prosemirror-gapcursor) をロードします。これにより、通常の選択ができない場所にカーソルのギャップが追加されます。たとえば、ドキュメントの最後にあるテーブルの後などです。

Tiptap はヘッドレスですが、gapcursor の外観には CSS が必要です。 [デフォルトのCSS](https://github.com/ueberdosis/tiptap/tree/main/packages/core/src/style.ts) は、Editor クラスを介して読み込まれます。

## インストール

```bash
npm install @tiptap/extension-gapcursor
```

## ソースコード

[packages/extension-gapcursor/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-gapcursor/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Gapcursor



# History

[![Version](https://img.shields.io/npm/v/@tiptap/extension-history.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-history)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-history.svg)](https://npmcharts.com/compare/@tiptap/extension-history?minimal=true)

<!-- This extension provides history support. All changes to the document will be tracked and can be removed with `undo`. Undone changes can be applied with `redo` again. -->

この拡張機能は、履歴サポートを提供します。ドキュメントへのすべての変更は追跡され、`undo` で削除できます。取り消された変更は、`redo` で再度適用できます。

## インストール

```bash
npm install @tiptap/extension-history
```

## 設定

### depth

<!-- The amount of history events that are collected before the oldest events are discarded. Defaults to 100. -->

最も古いイベントが破棄される前に収集された履歴イベントの量。デフォルトは「100」となります。

Default: `100`

```js
History.configure({
  depth: 10,
})
```

### newGroupDelay

<!-- The delay between changes after which a new group should be started (in milliseconds). When changes aren’t adjacent, a new group is always started. -->

新しいグループを開始する必要がある変更間の遅延（ミリ秒単位）。変更が隣接していない場合、新しいグループが常に開始されます。

Default: `500`

```js
History.configure({
  newGroupDelay: 1000,
})
```

## Commands

### undo()

<!-- Undo the last change. -->

最後の変更を元に戻します。

```js
editor.commands.undo()
```
### redo()

<!-- Redo the last change. -->

最後の変更をやり直します。

```js
editor.commands.redo()
```

## キーボード ショートカット

| Command | Windows/Linux                                                                            | macOS                                                                        |
| ------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| undo()  | `Control` + `Z`<br>`Control` + `R`                                                 | `Cmd` + `Z`<br>`Cmd` + `R`                                             |
| redo()  | `Shift` + `Control` + `Z`<br>`Control` + `Y`<br>`Shift` + `Control` + `R` | `Shift` + `Cmd` + `Z`<br>`Cmd` + `Y`<br>`Shift` + `Cmd` + `R` |

## ソースコード

[packages/extension-history/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-history/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/History



# プレースホルダー

[![Version](https://img.shields.io/npm/v/@tiptap/extension-placeholder.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-placeholder)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-placeholder.svg)](https://npmcharts.com/compare/@tiptap/extension-placeholder?minimal=true)

<!-- This extension provides placeholder support. Give your users an idea what they should write with a tiny hint. There is a handful of things to customize, if you feel like it. -->

この拡張機能は、プレースホルダーのサポートを提供します。小さなヒントを使って、ユーザーに何を書くべきかを考えさせます。必要に応じて、カスタマイズできるものがいくつかあります。


## インストール

```bash
npm install @tiptap/extension-placeholder
```

## 設定

### emptyEditorClass

<!-- The added CSS class if the editor is empty. -->

エディターが空の場合に追加された CSS クラス。

Default: `'is-editor-empty'`

```js
Placeholder.configure({
  emptyEditorClass: 'is-editor-empty',
})
```

### emptyNodeClass

<!-- The added CSS class if the node is empty. -->

ノードが空の場合に追加された CSS クラス。

Default: `'is-empty'`

```js
Placeholder.configure({
  emptyNodeClass: 'my-custom-is-empty-class',
})
```

### placeholder

<!-- The placeholder text added as `data-placeholder` attribute. -->

`data-placeholder` 属性として追加されたプレースホルダーテキスト。

Default: `'Write something …'`

```js
Placeholder.configure({
  placeholder: 'My Custom Placeholder',
})
```

<!-- You can even use a function to add placeholder depending on the node: -->

ノードに応じて、関数を使用してプレースホルダーを追加することもできます。

```js
Placeholder.configure({
  placeholder: ({ node }) => {
    if (node.type.name === 'heading') {
      return 'What’s the title?'
    }

    return 'Can you add some further context?'
  },
})
```

### showOnlyWhenEditable

<!-- Show decorations only when editor is editable. -->

エディターが編集可能な場合にのみ装飾を表示します。

Default: `true`

```js
Placeholder.configure({
  showOnlyWhenEditable: false,
})
```

### showOnlyCurrent

<!-- Show decorations only in currently selected node. -->

現在選択されているノードにのみ装飾を表示します。

Default: `true`

```js
Placeholder.configure({
  showOnlyCurrent: false
})
```

### includeChildren

<!-- Show decorations also for nested nodes. -->

ネストされたノードの装飾も表示します。

Default: `false`

```js
Placeholder.configure({
  includeChildren: true
})
```

## ソースコード

[packages/extension-placeholder/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-placeholder/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Placeholder



# StarterKit

[![Version](https://img.shields.io/npm/v/@tiptap/starter-kit.svg?label=version)](https://www.npmjs.com/package/@tiptap/starter-kit)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/starter-kit.svg)](https://npmcharts.com/compare/@tiptap/starter-kit?minimal=true)

<!-- The `StarterKit` is a collection of the most popular Tiptap extensions. If you’re just getting started, this extension is for you. -->

`StarterKit` は、最も人気のある Tiptap 拡張機能のコレクションです。始めたばかりの場合は、この拡張機能が最適です。

## インストール

```bash
npm install @tiptap/starter-kit
```

## 含まれている拡張機能

### Nodes

* [`Blockquote`](/api/nodes/blockquote)
* [`BulletList`](/api/nodes/bullet-list)
* [`CodeBlock`](/api/nodes/code-block)
* [`Document`](/api/nodes/document)
* [`HardBreak`](/api/nodes/hard-break)
* [`Heading`](/api/nodes/heading)
* [`HorizontalRule`](/api/nodes/horizontal-rule)
* [`ListItem`](/api/nodes/list-item)
* [`OrderedList`](/api/nodes/ordered-list)
* [`Paragraph`](/api/nodes/paragraph)
* [`Text`](/api/nodes/text)

### Marks

* [`Bold`](/api/marks/bold)
* [`Code`](/api/marks/code)
* [`Italic`](/api/marks/italic)
* [`Strike`](/api/marks/strike)

### Extensions

* [`Dropcursor`](/api/extensions/dropcursor)
* [`Gapcursor`](/api/extensions/gapcursor)
* [`History`](/api/extensions/history)

## ソースコード

[packages/starter-kit/](https://github.com/ueberdosis/tiptap/blob/main/packages/starter-kit/)

## 使い方

<!-- Pass `StarterKit` to the editor to load all included extension at once. -->

`StarterKit` をエディタに渡して、含まれているすべての拡張機能を一度にロードします。

```js

const editor = new Editor({
  content: '<p>Example Text</p>',
  extensions: [
    StarterKit,
  ],
})
```

<!-- You can configure the included extensions, or even disable a few of them, like shown below. -->

以下に示すように、含まれている拡張機能を構成したり、いくつかの拡張機能を無効にしたりすることもできます。

```js

const editor = new Editor({
  content: '<p>Example Text</p>',
  extensions: [
    StarterKit.configure({
      // Disable an included extension
      history: false,

      // Configure an included extension
      heading: {
        levels: [1, 2],
      },
    }),
  ],
})
```



# TextAlign

[![Version](https://img.shields.io/npm/v/@tiptap/extension-text-align.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-text-align)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-text-align.svg)](https://npmcharts.com/compare/@tiptap/extension-text-align?minimal=true)

<!-- This extension adds a text align attribute to a specified list of nodes. The attribute is used to align the text. -->

この拡張機能は、指定されたノードのリストにテキスト整列属性を追加します。この属性は、テキストを揃えるために使用されます。

<!-- :::warning Firefox bug
`text-align: justify` doesn't work together with `white-space: pre-wrap` in Firefox, [that’s a known issue](https://bugzilla.mozilla.org/show_bug.cgi?id=1253840).
::: -->

> **Firefoxのバグを警告する**
`text-align: justify` は Firefox の` white-space: pre-wrap` と一緒に機能しません。[これは既知の問題です](https://bugzilla.mozilla.org/show_bug.cgi?id=1253840)

## インストール

```bash
npm install @tiptap/extension-text-align
```

## 設定

### types

<!-- A list of nodes where the text align attribute should be applied to. Usually something like `['heading', 'paragraph']`. -->

テキスト整列属性を適用する必要があるノードのリスト。通常、`['heading', 'paragraph']` のようなものです。

Default: `[]`

```js
TextAlign.configure({
  types: ['heading', 'paragraph'],
})
```

### alignments

<!-- A list of available options for the text align attribute. -->

テキスト整列属性で使用可能なオプションのリスト。

Default: `['left', 'center', 'right', 'justify']`

```js
TextAlign.configure({
  alignments: ['left', 'right'],
})
```

### defaultAlignment

<!-- The default text align. -->

デフォルトのテキスト整列。

Default: `'left'`

```js
TextAlign.configure({
  defaultAlignment: 'right',
})
```


## コマンド

### setTextAlign()

<!-- Set the text align to the specified value. -->

テキストを指定された値に揃えます。

```js
editor.commands.setTextAlign('right')
```

### unsetTextAlign()

<!-- Remove the text align value. -->

テキスト整列値を削除します。

```js
editor.commands.unsetTextAlign()
```

## キーボード ショートカット

| コマンド                 | Windows/Linux                | macOS                       |
| ----------------------- | ---------------------------- | --------------------------- |
| setTextAlign('left')    | `Ctrl` + `Shift` + `L` | `Cmd` + `Shift` + `L` |
| setTextAlign('center')  | `Ctrl` + `Shift` + `E` | `Cmd` + `Shift` + `E` |
| setTextAlign('right')   | `Ctrl` + `Shift` + `R` | `Cmd` + `Shift` + `R` |
| setTextAlign('justify') | `Ctrl` + `Shift` + `J` | `Cmd` + `Shift` + `J` |

## ソースコード

[packages/extension-text-align/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text-align/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/TextAlign



# タイポグラフィ

[![Version](https://img.shields.io/npm/v/@tiptap/extension-typography.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-typography)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-typography.svg)](https://npmcharts.com/compare/@tiptap/extension-typography?minimal=true)

<!-- This extension tries to help with common text patterns with the correct typographic character. Under the hood all rules are input rules. -->

この拡張機能は、正しい活版印刷文字を使用した一般的なテキストパターンを支援しようとします。内部的には、すべてのルールは入力ルールです。

## インストール

```bash
npm install @tiptap/extension-typography
```

## ルール

| 名前 | 説明 |
| --- | --- |
| emDash | 二重ダッシュ `--` を emdash `—` に変換 |
| ellipsis | 3つのドット `...` を省略記号 `…` に変換 |
| openDoubleQuote     | 二重引用符で始める |
| closeDoubleQuote    | 二重引用符で閉じる |
| openSingleQuote     | 一重引用符で始める |
| closeSingleQuote    | 一重引用符で閉じる |
| leftArrow           | `<-` を矢印`←`に変換 |
| rightArrow          | `->` 矢印`→`に変換 |
| copyright           | `(c)` を著作権記号 `©` に変換 |
| registeredTrademark | `(r)` を登録商標記号 `®` に変換 |
| trademark           | `(tm)` を登録商標記号 `™` に変換 |
| oneHalf             | `1/2` を `½` に変換 |
| oneQuarter          | `1/4` を `¼` に変換 |
| threeQuarters       | `3/4` を`¾` に変換 |
| plusMinus           | `+/-` を `±` に変換 |
| notEqual            | `!=` を `≠` に変換 |
| laquo               | `<<` を `«` に変換 |
| raquo               | `>>` を `»` に変換 |
| multiplication  | `2 * 3` または `2x3` を `2×3` に変換 |
| superscriptTwo      | `^2` を `²` に変換 |
| superscriptThree    | `^3` を `³` に変換 |

## キーボード ショートカット

| コマンド         | Windows/Linux | macOS       |
| --------------- | ------------- | ----------- |
| undoInputRule() | `Backspace`   | `Backspace` |

## ソースコード

[packages/extension-typography/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-typography/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Typography

### ルールの無効化

<!-- You can configure the included rules, or even disable a few of them, like shown below. -->

以下に示すように、含まれているルールを構成したり、いくつかのルールを無効にしたりすることもできます。

```js

const editor = new Editor({
  extensions: [
    // Disable some included rules
    Typography.configure({
      oneHalf: false,
      oneQuarter: false,
      threeQuarters: false,
    }),
  ],
})
```

# HTML
[![Version](https://img.shields.io/npm/v/@tiptap/html.svg?label=version)](https://www.npmjs.com/package/@tiptap/html)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/html.svg)](https://npmcharts.com/compare/@tiptap/html?minimal=true)

<!-- The utility helps rendering JSON content as HTML, and generating JSON from HTML, without an editor instance, for example on the server side. -->

<!-- All it needs is JSON or a HTML string, and a list of extensions. -->

このユーティリティは、JSON コンテンツを HTML としてレンダリングします。サーバー側でエディターインスタンスを使用せずに HTML から JSON を生成するのに役立ちます。

必要なのは、JSON または HTML 文字列と、拡張機能のリストだけです。

## ソースコード
[packages/html/](https://github.com/ueberdosis/tiptap/blob/main/packages/html/)

## JSONからHTMLを生成する
https://embed.tiptap.dev/preview/GuideContent/GenerateHTML

## HTMLからJSONを生成する
https://embed.tiptap.dev/preview/GuideContent/GenerateJSON

# Suggestion
[![Version](https://img.shields.io/npm/v/@tiptap/suggestion.svg?label=version)](https://www.npmjs.com/package/@tiptap/suggestion)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/suggestion.svg)](https://npmcharts.com/compare/@tiptap/suggestion?minimal=true)

<!-- This utility helps with all kinds of suggestions in the editor. Have a look at the [`Mention`](/api/nodes/mention), [`Hashtag`](/api/nodes/hashtag) or [`Emoji`](/api/nodes/emoji) node to see it in action. -->

このユーティリティは、エディタでのあらゆる種類の提案に役立ちます。 [`Mention`](/api/nodes/mention)、 [`Hashtag`](/api/nodes/hashtag) または [`Emoji`](/api/nodes/emoji) ノードを見てください動作中。

## 設定

### char
<!-- The character that triggers the autocomplete popup. -->

オートコンプリートポップアップをトリガーする文字。

Default: `'@'`

### pluginKey
<!-- ProseMirror PluginKey. -->

ProseMirror の プラグインキー。

Default: `SuggestionPluginKey`

### allowSpaces
<!-- Allows or disallows spaces in suggested items. -->

提案されたアイテムのスペースを許可または禁止します。

Default: `false`

### allowedPrefixes
<!-- The prefix characters that are allowed to trigger a suggestion. Set to `null` to allow any prefix character. -->

提案をトリガーできるプレフィックス文字。 `null` に設定すると、任意のプレフィックス文字が許可されます。

Default: `[' ']`

### startOfLine
<!-- Trigger the autocomplete popup at the start of a line only. -->

行の先頭でのみオートコンプリートポップアップをトリガーします。

Default: `false`

### decorationTag
<!-- The HTML tag that should be rendered for the suggestion. -->

提案のためにレンダリングする必要のある HTML タグ。

Default: `'span'`

### decorationClass
<!-- A CSS class that should be added to the suggestion. -->

提案に追加する必要がある CSS クラス。

Default: `'suggestion'`

### command
<!-- Executed when a suggestion is selected. -->

提案が選択されたときに実行されます。

Default: `() => {}'`

### items
<!-- Pass an array of filtered suggestions, can be async. -->

フィルタリングされた提案の配列を渡します。非同期にすることができます。

Default: `({ editor, query }) => []`

### render
<!-- A render function for the autocomplete popup. -->

オートコンプリートポップアップのレンダリング機能。

Default: `() => ({})`


## ソースコード
[packages/suggestion/](https://github.com/ueberdosis/tiptap/blob/main/packages/suggestion/)


# Tiptap for PHP
[![Latest Version on Packagist](https://img.shields.io/packagist/v/ueberdosis/tiptap-php.svg)](https://packagist.org/packages/ueberdosis/tiptap-php)
[![Total Downloads](https://img.shields.io/packagist/dt/ueberdosis/tiptap-php.svg)](https://packagist.org/packages/ueberdosis/tiptap-php)

## はじめに
A PHP package to work with [Tiptap](https://tiptap.dev/) content. You can transform Tiptap-compatible JSON to HTML, and the other way around, sanitize your content, or just modify it.

[Tiptap]（https://tiptap.dev/）コンテンツを処理するためのPHPパッケージ。 Tiptap互換のJSONをHTMLに変換したり、その逆を行ったり、コンテンツをサニタイズしたり、単に変更したりすることができます。

## インストール
You can install the package via composer:

パッケージはcomposerを介してインストールできます。

```bash
composer require ueberdosis/tiptap-php
```

## 使い方
The PHP package mimics large parts of the JavaScript package. If you know your way around Tiptap, the PHP syntax will feel familiar to you. Here is an easy example:

PHPパッケージは、JavaScriptパッケージの大部分を模倣しています。 Tiptapの使い方を知っているなら、PHP構文はあなたに馴染みがあると感じるでしょう。簡単な例を次に示します。

```php
(new Tiptap\Editor)
    ->setContent('<p>Example Text</p>')
    ->getDocument();

// Returns:
// ['type' => 'doc', 'content' => …]
```

## ドキュメンテーション
There’s a lot more the PHP package can do. Check out the [repository on GitHub](https://github.com/ueberdosis/tiptap-php).

PHPパッケージでできることは他にもたくさんあります。 [GitHubのリポジトリ]（https://github.com/ueberdosis/tiptap-php）を確認してください。




# キーボード ショートカット

## はじめに

<!-- tiptap comes with sensible keyboard shortcut defaults. Depending on what you want to use it for, you’ll probably want to change those keyboard shortcuts to your liking. Let’s have a look at what we defined for you, and show you how to change it then! -->

<!-- Funfact: We built a [keyboard shortcut learning app](https://mouseless.app), to which we manually added exercises for thousands of keyboard shortcuts for a bunch of tools. -->

Tiptap には、実用的なキーボードショートカットのデフォルトが付属しています。 用途に応じて、これらのキーボードショートカットを好みに合わせて変更することをお勧めします。 私たちがあなたのために定義したものを見て、それを変更する方法を示しましょう！

[キーボードショートカット学習アプリ](https://mouseless.app) を作成しました。これに、多数のツールの何千ものキーボードショートカットの演習を手動で追加しました。

## 事前に定義されたキーボードショートカット

ほとんどのコア拡張機能は、独自のキーボードショートカットを登録します。 使用する拡張機能のセットによっては、以下にリストされているキーボードショートカットのすべてがエディターで機能するわけではありません。

<!-- Most of the core extensions register their own keyboard shortcuts. Depending on what set of extension you use, not all of the below listed keyboard shortcuts work for your editor. -->

### よく使うショートカット

| コマンド                   | Windows/Linux                   | macOS                       |
| ------------------------ | ------------------------------- | --------------------------- |
| Copy                     | `Ctrl` + `C`              | `Cmd` + `C`              |
| Cut                      | `Ctrl` + `X`              | `Cmd` + `X`              |
| Paste                    | `Ctrl` + `V`              | `Cmd` + `V`              |
| Paste without formatting | `Ctrl` + `Shift` + `V` | `Cmd` + `Shift` + `V` |
| Undo                     | `Ctrl` + `Z`              | `Cmd` + `Z`              |
| Redo                     | `Ctrl` + `Shift` + `Z` | `Cmd` + `Shift` + `Z` |
| Add a line break         | `Shift` + `Enter`            | `Shift` + `Enter`        |

### テキスト フォーマット

| コマンド        | Windows/Linux                   | macOS                       |
| ------------- | ------------------------------- | --------------------------- |
| Bold          | `Ctrl` + `B`              | `Cmd` + `B`              |
| Italicize     | `Ctrl` + `I`              | `Cmd` + `I`              |
| Underline     | `Ctrl` + `U`              | `Cmd` + `U`              |
| Strikethrough | `Ctrl` + `Shift` + `X` | `Cmd` + `Shift` + `X` |
| Highlight     | `Ctrl` + `Shift` + `H` | `Cmd` + `Shift` + `H` |
| Code          | `Ctrl` + `E`              | `Cmd` + `E`              |

### パラグラフ フォーマット

| コマンド                  | Windows/Linux                   | macOS                       |
| ----------------------- | ------------------------------- | --------------------------- |
| Apply normal text style | `Ctrl` + `Alt` + `0`   | `Cmd` + `Alt` + `0`   |
| Apply heading style 1   | `Ctrl` + `Alt` + `1`   | `Cmd` + `Alt` + `1`   |
| Apply heading style 2   | `Ctrl` + `Alt` + `2`   | `Cmd` + `Alt` + `2`   |
| Apply heading style 3   | `Ctrl` + `Alt` + `3`   | `Cmd` + `Alt` + `3`   |
| Apply heading style 4   | `Ctrl` + `Alt` + `4`   | `Cmd` + `Alt` + `4`   |
| Apply heading style 5   | `Ctrl` + `Alt` + `5`   | `Cmd` + `Alt` + `5`   |
| Apply heading style 6   | `Ctrl` + `Alt` + `6`   | `Cmd` + `Alt` + `6`   |
| Ordered list            | `Ctrl` + `Shift` + `7` | `Cmd` + `Shift` + `7` |
| Bullet list             | `Ctrl` + `Shift` + `8` | `Cmd` + `Shift` + `8` |
| Task list               | `Ctrl` + `Shift` + `9` | `Cmd` + `Shift` + `9` |
| Blockquote              | `Ctrl` + `Shift` + `B` | `Cmd` + `Shift` + `B` |
| Left align              | `Ctrl` + `Shift` + `L` | `Cmd` + `Shift` + `L` |
| Center align            | `Ctrl` + `Shift` + `E` | `Cmd` + `Shift` + `E` |
| Right align             | `Ctrl` + `Shift` + `R` | `Cmd` + `Shift` + `R` |
| Justify                 | `Ctrl` + `Shift` + `J` | `Cmd` + `Shift` + `J` |
| Code block              | `Ctrl` + `Alt` + `C`   | `Cmd` + `Alt` + `C`   |
| Subscript               | `Ctrl` + `,`              | `Cmd` + `,`              |
| Superscript             | `Ctrl` + `.`              | `Cmd` + `.`              |

<!--| Toggle task| `Ctrl` + `Enter` | `Cmd` + `Enter` | -->

### テキストの選択

| コマンド | Windows/Linux | macOS |
| ------------------------------------------------- | ------------------------------- | --------------------------- |
| すべてを選択  | `Ctrl` + `A`              | `Cmd` + `A`              |
| 選択範囲を1文字左に拡張 | `Shift` + `←`                | `Shift` + `←`            |
| 選択範囲を1文字右に拡張 | `Shift` + `→`                | `Shift` + `→`            |
| 選択範囲を1列に拡張 | `Shift` + `↑`                | `Shift` + `↑`            |
| 選択範囲を1行下に拡張 | `Shift` + `↓`                | `Shift` + `↓`            |
| 選択範囲をドキュメントの先頭まで拡張 | `Ctrl` + `Shift` + `↑` | `Cmd` + `Shift` + `↑` |
| 選択範囲をドキュメントの最後まで拡張 | `Ctrl` + `Shift` + `↓` | `Cmd` + `Shift` + `↓` |

## ショートカットの上書き

<!-- Keyboard shortcuts may be strings like `'Shift-Control-Enter'`. Keys are based on the strings that can appear in `event.key`, concatenated with a `-`. There is a little tool called [keycode.info](https://keycode.info/), which shows the `event.key` interactively. -->

<!-- Use lowercase letters to refer to letter keys (or uppercase letters if you want shift to be held). You may use `Space` as an alias for the <code>&nbsp;</code>. -->

<!-- Modifiers can be given in any order. `Shift`, `Alt`, `Control` and `Cmd` are recognized. For characters that are created by holding shift, the `Shift` prefix is implied, and should not be added explicitly. -->

<!-- You can use `Mod` as a shorthand for `Cmd` on Mac and `Control` on other platforms. -->

<!-- Here is an example how you can overwrite the keyboard shortcuts for an existing extension: -->

キーボードショートカットは、`'Shift-Control-Enter'` のような文字列にすることができます。 キーは、`-` と連結された `event.key` に表示できる文字列に基づいています。[keycode.info](https://keycode.info/) と呼ばれる小さなツールがあり、`event.key` をインタラクティブに表示します。

文字キー（または Shift キーを押したままにする場合は大文字）を参照するには、小文字を使用します。<code>&nbsp;</code> のエイリアスとして `Space` を使用できます。

修飾子は任意の順序で指定できます。`Shift`、`Alt`、`Control`、`Cmd` が認識されます。 Shift キーを押しながら作成された文字の場合、`Shift` プレフィックスが暗黙指定されているため、明示的に追加しないでください。

Mac では `Cmd`、その他のプラットフォームでは `Control` の省略形として `Mod` を使用できます。

既存の拡張機能のキーボードショートカットを上書きする方法の例を次に示します。

```js
// 1. Import the extension

// 2. Overwrite the keyboard shortcuts
const CustomBulletList = BulletList.extend({
  addKeyboardShortcuts() {
    return {
      // ↓ your new keyboard shortcut
      'Mod-l': () => this.editor.commands.toggleBulletList(),
    }
  },
})

// 3. Add the custom extension to your editor
new Editor({
  extensions: [
    CustomBulletList(),
    // …
  ],
})
```



# スキーマ

## はじめに

<!-- Unlike many other editors, Tiptap is based on a [schema](https://prosemirror.net/docs/guide/#schema) that defines how your content is structured. That enables you to define the kind of nodes that may occur in the document, its attributes and the way they can be nested. -->

<!-- This schema is *very* strict. You can’t use any HTML element or attribute that is not defined in your schema. -->

<!-- Let me give you one example: If you paste something like `This is <strong>important</strong>` into Tiptap, but don’t have any extension that handles `strong` tags, you’ll only see `This is important` – without the strong tags. -->

他の多くのエディターとは異なり、Tiptap はコンテンツの構造を定義する [スキーマ](https://prosemirror.net/docs/guide/#schema) に基づいています。これにより、ドキュメントで発生する可能性のあるノードの種類、その属性、およびそれらをネストする方法を定義できます。

このスキーマは *非常に* 厳密です。スキーマで定義されていない HTML 要素または属性を使用することはできません。

一例を挙げましょう。「これは <strong>重要 </strong> 」のようなものを Tiptap に貼り付けても、「strong」タグを処理する拡張子がない場合は、「これは 重要」と表示されるだけです。strong タグはありません。

## スキーマはどのように見えるか

提供されている拡張機能のみを使用する場合は、スキーマについてそれほど気にする必要はありません。独自の拡張機能を構築している場合は、スキーマがどのように機能するかを理解しておくと役立つでしょう。典型的な ProseMirror エディターの最も単純なスキーマを見てみましょう。

<!-- When you’ll work with the provided extensions only, you don’t have to care that much about the schema. If you’re building your own extensions, it’s probably helpful to understand how the schema works. Let’s look at the most simple schema for a typical ProseMirror editor: -->

```js
// the underlying ProseMirror schema
{
  nodes: {
    document: {
      content: 'block+',
    },
    paragraph: {
      content: 'inline*',
      group: 'block',
      parseDOM: [{ tag: 'p' }],
      toDOM: () => ['p', 0],
    },
    text: {
      group: 'inline',
    },
  },
}
```

<!-- We register three nodes here. `doc`, `paragraph` and `text`. `doc` is the root node which allows one or more block nodes as children (`content: 'block+'`). Since `paragraph` is in the group of block nodes (`group: 'block'`) our document can only contain paragraphs. Our paragraphs allow zero or more inline nodes as children (`content: 'inline*'`) so there can only be `text` in it. `parseDOM` defines how a node can be parsed from pasted HTML. `toDOM` defines how it will be rendered in the DOM. -->

<!-- In Tiptap every node, mark and extension is living in its own file. This allows us to split the logic. Under the hood the whole schema will be merged together: -->

ここで3つのノードを登録します。`doc`、`paragraph` および `text`。`doc` は、1つ以上のブロックノードを子として許可するルートノードです（`content: 'block+'`）。`paragraph` はブロックノードのグループ（`group: 'block'`）にあるため、ドキュメントには段落のみを含めることができます。私たちの段落では、0個以上のインラインノードを子として許可しているため（`content: 'inline*'`）、その中には `text` しか含めることができません。`parseDOM` は、貼り付けられた HTML からノードを解析する方法を定義します。`toDOM` は、DOM でのレンダリング方法を定義します。

Tiptapでは、すべてのノード、マーク、および拡張子が独自のファイルに存在します。これにより、ロジックを分割できます。内部的には、スキーマ全体がマージされます。

```js
// the Tiptap schema API

const Document = Node.create({
  name: 'doc',
  topNode: true,
  content: 'block+',
})

const Paragraph = Node.create({
  name: 'paragraph',
  group: 'block',
  content: 'inline*',
  parseHTML() {
    return [
      { tag: 'p' },
    ]
  },
  renderHTML({ HTMLAttributes }) {
    return ['p', HTMLAttributes, 0]
  },
})

const Text = Node.create({
  name: 'text',
  group: 'inline',
})
```

## ノードとマーク

### 違い

<!-- Nodes are like blocks of content, for example paragraphs, headings, code blocks, blockquotes and many more. -->

<!-- Marks can be applied to specific parts of a node. That’s the case for **bold**, *italic* or ~~striked~~ text. [Links](#) are marks, too. -->

ノードは、段落、見出し、コードブロック、ブロッククォートなどのコンテンツのブロックのようなものです。

マークは、ノードの特定の部分に適用できます。これは、**太字**、*斜体*、または~~打たれた~~テキストの場合です。[Links](#) もマークです。

### ノードスキーマ

#### Content

content 属性は、ノードが持つことができるコンテンツの種類を正確に定義します。 ProseMirror はそれに対して本当に厳格です。つまり、スキーマに適合しないコンテンツは破棄されます。名前またはグループを文字列として想定しています。次にいくつかの例を示します。

<!-- The content attribute defines exactly what kind of content the node can have. ProseMirror is really strict with that. That means, content which doesn’t fit the schema is thrown away. It expects a name or group as a string. Here are a few examples: -->

```js
Node.create({
  // must have one or more blocks
  content: 'block+',

  // must have zero or more blocks
  content: 'block*',

  // allows all kinds of 'inline' content (text or hard breaks)
  content: 'inline*',

  // must not have anything else than 'text'
  content: 'text*',

  // can have one or more paragraphs, or lists (if lists are used)
  content: '(paragraph|list?)+',

  // must have exact one heading at the top, and one or more blocks below
  content: 'heading block+'
})
```

#### Marks

スキーマの `marks` 設定を使用して、ノード内で許可されるマークを定義できます。 1つ以上の名前またはマークのグループを追加し、次のようにすべてのマークを許可または禁止します。

<!-- You can define which marks are allowed inside of a node with the `marks` setting of the schema. Add a one or more names or groups of marks, allow all or disallow all marks like this: -->

```js
Node.create({
  // allows only the 'bold' mark
  marks: 'bold',

  // allows only the 'bold' and 'italic' marks
  marks: 'bold italic',

  // allows all marks
  marks: '_',

  // disallows all marks
  marks: '',
})
```

#### Group

<!-- Add this node to a group of extensions, which can be referred to in the [content](#content) attribute of the schema. -->

このノードを拡張機能のグループに追加します。拡張機能は、スキーマの[content](#content) 属性で参照できます。

```js
Node.create({
  // add to 'block' group
  group: 'block',

  // add to 'inline' group
  group: 'inline',

  // add to 'block' and 'list' group
  group: 'block list',
})
```

#### Inline

<!-- Nodes can be rendered inline, too. When setting `inline: true` nodes are rendered in line with the text. That’s the case for mentions. The result is more like a mark, but with the functionality of a node. One difference is the resulting JSON document. Multiple marks are applied at once, inline nodes would result in a nested structure. -->

ノードはインラインでレンダリングすることもできます。`inline: true` を設定すると、ノードはテキストに沿ってレンダリングされます。それは言及の場合です。結果はマークに似ていますが、ノードの機能を備えています。 1つの違いは、結果の JSON ドキュメントです。複数のマークが一度に適用されると、インラインノードはネストされた構造になります。

```js
Node.create({
  // renders nodes in line with the text, for example
  inline: true,
})
```

<!-- For some cases where you want features that aren’t available in marks, for example a node view, try if an inline node would work: -->

ノードビューなど、マークで使用できない機能が必要な場合は、インラインノードが機能するかどうかを試してください。

```js
Node.create({
  name: 'customInlineNode',
  group: 'inline',
  inline: true,
  content: 'text*',
})
```

#### Atom

<!-- Nodes with `atom: true` aren’t directly editable and should be treated as a single unit. It’s not so likely to use that in a editor context, but this is how it would look like: -->

`atom: true` のノードは直接編集できないため、単一のユニットとして扱う必要があります。これをエディターのコンテキストで使用する可能性はそれほど高くありませんが、次のようになります。

```js
Node.create({
  atom: true,
})
```

<!-- One example is the [`Mention`](/api/nodes/mention) extension, which somehow looks like text, but behaves more like a single unit. As this doesn’t have editable text content, it’s empty when you copy such node. Good news though, you can control that. Here is the example from the [`Mention`](/api/nodes/mention) extension: -->

1つの例は、[`Mention`](/api/nodes/mention) 拡張機能です。これは、どういうわけかテキストのように見えますが、単一のユニットのように動作します。これには編集可能なテキストコンテンツがないため、そのようなノードをコピーすると空になります。良いニュースですが、あなたはそれをコントロールすることができます。 [`Mention`](/api/nodes/mention) 拡張機能の例を次に示します。

```js
// Used to convert an atom node to plain text
renderText({ node }) {
  return `@${node.attrs.id}`
},
```

#### Selectable

<!-- Besides the already visible text selection, there is an invisible node selection. If you want to make your nodes selectable, you can configure it like this: -->

すでに表示されているテキストの選択に加えて、非表示のノードの選択があります。ノードを選択可能にする場合は、次のように構成できます。

```js
Node.create({
  selectable: true,
})
```

#### Draggable

<!-- All nodes can be configured to be draggable (by default they aren’t) with this setting: -->

この設定を使用すると、すべてのノードをドラッグ可能に構成できます（デフォルトではドラッグ可能ではありません）。

```js
Node.create({
  draggable: true,
})
```

#### Code

<!-- Users expect code to behave very differently. For all kind of nodes containing code, you can set `code: true` to take this into account. -->

ユーザーは、コードの動作が大きく異なることを期待しています。コードを含むすべての種類のノードについて、これを考慮に入れるために  `code: true` を設定できます。

```js
Node.create({
  code: true,
})
```

#### Whitespace

<!-- Controls way whitespace in this a node is parsed. -->

このノードの空白を解析する方法を制御します。

```js
Node.create({
  whitespace: 'pre',
})
```

#### Defining

<!-- Nodes get dropped when their entire content is replaced (for example, when pasting new content) by default. If a node should be kept for such replace operations, configure them as `defining`. -->

デフォルトでは、コンテンツ全体が置き換えられると（たとえば、新しいコンテンツを貼り付けるときに）、ノードはドロップされます。このような置換操作のためにノードを保持する必要がある場合は、それらを「defining (定義)」として構成します。

通常、これは [`Blockquote`](/api/nodes/blockquote), [`CodeBlock`](/api/nodes/code-block), [`Heading`](/api/nodes/heading), [`ListItem`](/api/nodes/list-item) に適用されます。

<!-- Typically, that applies to [`Blockquote`](/api/nodes/blockquote), [`CodeBlock`](/api/nodes/code-block), [`Heading`](/api/nodes/heading), and [`ListItem`](/api/nodes/list-item). -->

```js
Node.create({
  defining: true,
})
```

#### Isolating

<!-- For nodes that should fence the cursor for regular editing operations like backspacing, for example a TableCell, set `isolating: true`. -->

TableCell など、バックスペースなどの通常の編集操作のためにカーソルをフェンスする必要があるノードの場合は `isolating: true` を設定します。

```js
Node.create({
  isolating: true,
})
```

#### ギャップカーソルを許可する

[`Gapcursor`](/api/extensions/gapcursor) 拡張機能は、新しいスキーマ属性を登録して、そのノードのすべての場所でギャップカーソルを許可するかどうかを制御します。

<!-- The [`Gapcursor`](/api/extensions/gapcursor) extension registers a new schema attribute to control if gap cursors are allowed everywhere in that node. -->

```js
Node.create({
  allowGapCursor: false,
})
```

#### テーブルの役割

[`Table`](/api/nodes/table) 拡張機能は、ノードが持つ役割を構成するための新しいスキーマ属性を登録します。許可される値は `table`、`row`、`cell`、および `header_cell` です。

<!-- The [`Table`](/api/nodes/table) extension registers a new schema attribute to configure which role an Node has. Allowed values are `table`, `row`, `cell`, and `header_cell`. -->

```js
Node.create({
  tableRole: 'cell',
})
```

### マークスキーマ

#### Inclusive

カーソルが最後にあるときにマークをアクティブにしたくない場合は、包括的を `false` に設定します。たとえば、[`Link`](/api/marks/link) マークの設定方法は次のとおりです。

<!-- If you don’t want the mark to be active when the cursor is at its end, set inclusive to `false`. For example, that’s how it’s configured for [`Link`](/api/marks/link) marks: -->

```js
Mark.create({
  inclusive: false,
})
```

#### Excludes

デフォルトでは、すべてのノードを同時に適用できます。除外属性を使用すると、マークと共存してはならないマークを定義できます。たとえば、インラインコードマークは他のマーク（太字、斜体、その他すべて）を除外します。

<!-- By default all nodes can be applied at the same time. With the excludes attribute you can define which marks must not coexist with the mark. For example, the inline code mark excludes any other mark (bold, italic, and all others). -->

```js
Mark.create({
  // must not coexist with the bold mark
  excludes: 'bold'
  // exclude any other mark
  excludes: '_',
})
```

#### Group

<!-- Add this mark to a group of extensions, which can be referred to in the content attribute of the schema. -->

このマークを拡張機能のグループに追加します。これは、スキーマのコンテンツ属性で参照できます。

```js
Mark.create({
  // add this mark to the 'basic' group
  group: 'basic',
  // add this mark to the 'basic' and the 'foobar' group
  group: 'basic foobar',
})
```

#### Code

<!-- Users expect code to behave very differently. For all kind of marks containing code, you can set `code: true` to take this into account. -->

ユーザーは、コードの動作が大きく異なることを期待しています。コードを含むすべての種類のマークについて、これを考慮に入れるために `code: true` を設定できます。

```js
Mark.create({
  code: true,
})
```

#### Spanning

<!-- By default marks can span multiple nodes when rendered as HTML. Set `spanning: false` to indicate that a mark must not span multiple nodes. -->

デフォルトでは、マークは HTML としてレンダリングされるときに、複数のノードにまたがることができます。マークが複数のノードにまたがってはならないことを示すには、`spanning: false` を設定します。

```js
Mark.create({
  spanning: false,
})
```

## 基礎となる ProseMirror スキーマを取得します

基盤となるスキーマを操作する必要があるユースケースがいくつかあります。 Tiptap の共同テキスト編集機能を使用している場合、またはコンテンツを HTML として手動でレンダリングする場合は、これが必要になります。

<!-- There are a few use cases where you need to work with the underlying schema. You’ll need that if you’re using the Tiptap collaborative text editing features or if you want to manually render your content as HTML. -->

### オプション1：エディターを使用

クライアント側でこれが必要で、とにかくエディタインスタンスが必要な場合は、エディタから利用できます。

<!-- If you need this on the client side and need an editor instance anyway, it’s available through the editor: -->

```js

const editor = new Editor({
  extensions: [
    Document,
    Paragraph,
    Text,
    // add more extensions here
  ])
})

const schema = editor.schema
```

### オプション2：エディターなし

実際のエディターを初期化せずにスキーマを作成したいだけの場合は、`getSchema` ヘルパー関数を使用できます。利用可能な拡張機能の配列が必要であり、ProseMirror スキーマを便利に生成します。

<!-- If you just want to have the schema *without* initializing an actual editor, you can use the `getSchema` helper function. It needs an array of available extensions and conveniently generates a ProseMirror schema for you: -->

```js

const schema = getSchema([
  Document,
  Paragraph,
  Text,
  // add more extensions here
])
```



# イベント

## はじめに

<!-- The editor fires a few different events that you can hook into. Let’s have a look at all the available events first: -->

エディターは、フックできるいくつかの異なるイベントを発生させます。まず、利用可能なすべてのイベントを見てみましょう。

## 利用可能なイベントのリスト

### beforeCreate

<!-- Before the view is created. -->

ビューが作成される前

### create

<!-- The editor is ready. -->

エディターの準備が完了したとき

### update

<!-- The content has changed. -->

内容が変更したとき

### selectionUpdate

<!-- The selection has changed. -->

選択が変更されたとき

### transaction

<!-- The editor state has changed. -->

エディターの状態が変更されたとき

### focus

<!-- The editor is focused. -->

エディターに焦点を当てたとき

### blur

<!-- The editor isn’t focused anymore. -->

エディターがフォーカスを合わせていないとき

### destroy

<!-- The editor is being destroyed. -->

エディターが破棄されたとき


## Register event listeners

<!-- There are three ways to register event listeners. -->

イベントリスナーを登録する方法は3つあります。

### オプション 1: コンフィギュレーション

<!-- You can define your event listeners on a new editor instance right-away: -->

新しいエディターインスタンスでイベントリスナーをすぐに定義できます。

```js
const editor = new Editor({
  onBeforeCreate({ editor }) {
    // Before the view is created.
  },
  onCreate({ editor }) {
    // The editor is ready.
  },
  onUpdate({ editor }) {
    // The content has changed.
  },
  onSelectionUpdate({ editor }) {
    // The selection has changed.
  },
  onTransaction({ editor, transaction }) {
    // The editor state has changed.
  },
  onFocus({ editor, event }) {
    // The editor is focused.
  },
  onBlur({ editor, event }) {
    // The editor isn’t focused anymore.
  },
  onDestroy() {
    // The editor is being destroyed.
  },
})
```

### Option 2: バインディング

<!-- Or you can register your event listeners on a running editor instance: -->

または、実行中のエディターインスタンスにイベントリスナーを登録できます。

#### バインドイベントリスナー

```js
editor.on('beforeCreate', ({ editor }) => {
  // Before the view is created.
})

editor.on('create', ({ editor }) => {
  // The editor is ready.
})

editor.on('update', ({ editor }) => {
  // The content has changed.
})

editor.on('selectionUpdate', ({ editor }) => {
  // The selection has changed.
})

editor.on('transaction', ({ editor, transaction }) => {
  // The editor state has changed.
})

editor.on('focus', ({ editor, event }) => {
  // The editor is focused.
})

editor.on('blur', ({ editor, event }) => {
  // The editor isn’t focused anymore.
})

editor.on('destroy', () => {
  // The editor is being destroyed.
})
```

#### イベントリスナーのバインドを解除

<!-- If you need to unbind those event listeners at some point, you should register your event listeners with `.on()` and unbind them with `.off()` then. -->

ある時点でこれらのイベントリスナーのバインドを解除する必要がある場合は、イベントリスナーを `.on()` で登録し、 `.off()` でバインドを解除する必要があります。

```js
const onUpdate = () => {
  // The content has changed.
}

// Bind …
editor.on('update', onUpdate)

// … and unbind.
editor.off('update', onUpdate)
```

### Option 3: 拡張機能

<!-- Moving your event listeners to custom extensions (or nodes, or marks) is also possible. Here’s how that would look like: -->

イベントリスナーをカスタム拡張機能（またはノード、またはマーク）に移動することも可能です。これは次のようになります。

```js

const CustomExtension = Extension.create({
  onBeforeCreate({ editor }) {
    // Before the view is created.
  },
  onCreate({ editor }) {
    // The editor is ready.
  },
  onUpdate({ editor }) {
    // The content has changed.
  },
  onSelectionUpdate({ editor }) {
    // The selection has changed.
  },
  onTransaction({ editor, transaction }) {
    // The editor state has changed.
  },
  onFocus({ editor, event }) {
    // The editor is focused.
  },
  onBlur({ editor, event }) {
    // The editor isn’t focused anymore.
  },
  onDestroy() {
    // The editor is being destroyed.
  },
})
```

