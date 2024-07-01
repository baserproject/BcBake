# BcBake plugin for baserCMS

baserCMSのスキャッフォルドを作成するためのプラグインです。  
CakePHPの bake コマンドを拡張して、baserCMSのプラグインやテーマを作成するためのコマンドを提供します。

## プラグインの作成

プラグインを作成するためのコマンドは次の通りです。

```shell
bin/cake bake bc_plugin {PluginName}
```

`bake bc_plugin` コマンドは、CakePHPが提供する `bake plugin` コマンドが生成するファイルに加えて次のファイルを生成します。  
これによりすぐに baserCMSにインストール可能となります。

- `config.php`
- `config/setting.php`
- `src/ServiceProvider/PluginNameServiceProvider.php`
- `src/Event/PluginNameControllerEventListener.php`
- `src/Event/PluginNameModelEventListener.php`
- `src/Event/PluginNameViewEventListener.php`
- `src/Event/PluginNameHelperEventListener.php`
- `src/View/Helper/PluginNameBaserHelper.php`

不要なファイルは削除しましょう。


## MVCに関連するファイルの作成

MVCに関連するファイルを作成するためのコマンドは次の通りです。

```shell
bin/cake bake bc_all {table_name} -p {PluginName} --prefix Admin
```

`bake bc_all` コマンドは、CakePHPが提供する `bake all` コマンドが生成するファイルに加えて次のファイルを生成します。

- `src/Service/TableNameService.php`
- `src/Service/TableNameServiceInterface.php`
- `src/Service/Admin/TableNameAdminService.php`
- `src/Service/Admin/TableNameAdminServiceInterface.php`

サービスクラスを利用するには、サービスプロバイダに登録が必要となります。

```php
// src/ServiceProvider/PluginNameServiceProvider.php

use PluginName\Service\Admin\TableNameAdminService;
use PluginName\Service\Admin\TableNameAdminServiceInterface;

class PluginNameServiceProvider extends ServiceProvider
{

// provides プロパティにインターフェイスを定義
protected array $provides = [
    TableNameAdminServiceInterface::class,
];

// services メソッドにインターフェイスと実装クラスの関連付けを登録
public function services($container): void
{
    $container->defaultToShared(true);
    $container->add(TableNameAdminServiceInterface::class, TableNameAdminService::class);
}
```
