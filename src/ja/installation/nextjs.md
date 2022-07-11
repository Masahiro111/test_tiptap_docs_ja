---
title: Next.js WYSIWYG
tableOfContents: true
---

# Next.js

## はじめに

<!-- The following guide describes how to integrate Tiptap with your [Next.js](https://nextjs.org/) project. -->

次のガイドでは、Tiptap を[Next.js](https://nextjs.org/) プロジェクトと統合する方法について説明します。

## 要件

* [ノード](https://nodejs.org/en/download/) がマシンにインストールされている
* [React](https://reactjs.org/) の経験

<!-- * [Node](https://nodejs.org/en/download/) installed on your machine -->
<!-- * Experience with [React](https://reactjs.org/) -->

## 1. プロジェクトを作成します（オプション）

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

## 2.依存関係をインストールします

標準のボイラープレートが設定されたので、Tiptap の起動と実行を開始できます。このためには、`@tiptap/react` と `@tiptap/starter-kit` の2つのパッケージをインストールする必要があります。これらのパッケージにはすぐに開始するために必要なすべての拡張機能が含まれています。

<!-- Now that we have a standard boilerplate set up we can get started on getting Tiptap up and running! For this we will need to install two packages: `@tiptap/react` and `@tiptap/starter-kit` which includes all the extensions you need to get started quickly. -->

```bash
npm install @tiptap/react @tiptap/starter-kit
```

<!-- If you followed step 1 and 2, you can now start your project with `npm run dev`, and open [http://localhost:3000/](http://localhost:3000/) in your favorite browser. This might be different, if you’re working with an existing project. -->

手順1 と 2 を実行した場合は、`npm run dev` を使用してプロジェクトを開始し、お気に入りのブラウザで [http://localhost:3000 /](http://localhost:3000/) を開くことができます。既存のプロジェクトで作業している場合、これは異なる場合があります。

## 3.新しいコンポーネントを作成します

Tiptap の使用を実際に開始するには、アプリに新しいコンポーネントを追加する必要があります。これを行うには、最初に `components/` というディレクトリを作成します。次に、`Tiptap` と呼ぶコンポーネントを作成します。これを行うには、次のサンプルコードを  `components/Tiptap.js` に配置します。

<!-- To actually start using Tiptap, you’ll need to add a new component to your app. To do this, first create a directory called `components/`. Now it's time to create our component which we'll call `Tiptap`. To do this put the following example code in `components/Tiptap.js`. -->

```jsx
import { useEditor, EditorContent } from '@tiptap/react'
import StarterKit from '@tiptap/starter-kit'

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

## 4.アプリに追加します

次に、`pages/index.js` のコンテンツを次のサンプルコードに置き換えて、アプリで新しい `Tiptap` コンポーネントを使用します。

<!-- Now, let’s replace the content of `pages/index.js` with the following example code to use our new `Tiptap` component in our app. -->

```jsx
import Tiptap from '../components/Tiptap'

export default function Home() {
    return (
         <Tiptap />
    )
}
```
<!-- You should now see Tiptap in your browser. Time to give yourself a pat on the back! :) -->

これで、ブラウザに Tiptap が表示されます。背中を軽くたたく時間です！ :)
