---
title: React WYSIWYG
tableOfContents: true
---

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
import { useEditor, EditorContent } from '@tiptap/react'
import StarterKit from '@tiptap/starter-kit'

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
import Tiptap from './Tiptap.jsx'

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
