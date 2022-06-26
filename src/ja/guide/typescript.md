---
tableOfContents: true
---

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
import { Extension } from '@tiptap/core'

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
import { Extension } from '@tiptap/core'

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
import { CustomExtensionStorage } from './custom-extension

const customStorage = editor.storage.customExtension as CustomExtensionStorage
```

### コマンドタイプ

コアパッケージは `Command` タイプもエクスポートします。これは、コードで指定するすべてのコマンドに追加する必要があります。次に例を示します。

<!-- The core package also exports a `Command` type, which needs to be added to all commands that you specify in your code. Here is an example: -->

```ts
import { Extension } from '@tiptap/core'

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
