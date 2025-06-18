# BeianFooter 插件

[![作者](https://img.shields.io/badge/Author-JoyNop-blue?style=flat-square&logo=github)](https://github.com/JoyNop)  
[![仓库](https://img.shields.io/badge/GitHub-Repository-black?style=flat-square&logo=github&logoColor=white)](https://github.com/JoyNop/BeianFooter)  
[![License](https://img.shields.io/github/license/JoyNop/BeianFooter?style=flat-square)](https://github.com/JoyNop/BeianFooter/blob/main/LICENSE)

> 一个用于 Typecho 博客系统的备案信息展示插件，支持 **ICP 备案** 和 **公安备案** 信息在网页底部自动显示。

---

## 📌 插件简介

`BeianFooter` 插件允许你在网站底部自动插入备案信息，包括：

- ICP 备案号及跳转链接（可选图标）
- 公安备案号及跳转链接（可选图标）

无须修改主题模板，安装插件并在后台填写信息即可生效。

---

## 🔧 安装方式

1. 下载插件压缩包并解压
2. 将解压后的 `BeianFooter` 文件夹上传至你的网站目录下的：  
   `usr/plugins/BeianFooter/`
3. 登录 Typecho 管理后台
4. 进入【控制台 → 插件管理】启用 `BeianFooter` 插件
5. 点击插件设置按钮，填写备案信息

---

## ⚙️ 后台可配置项

| 配置项名称       | 说明                             | 示例 |
| ---------------- | -------------------------------- | ---- |
| ICP 备案号       | 如“京 ICP 备 04000001 号-2”      | ✔️   |
| ICP 备案跳转链接 | 默认：https://beian.miit.gov.cn/ | ✔️   |
| ICP 备案图标地址 | 可选，填写图标链接               | ❓   |
| 公安备案号       | 如“京公网安备 11040102700068 号” | ✔️   |
| 公安备案跳转链接 | 如公安备案的真实跳转地址         | ✔️   |
| 公安备案图标地址 | 可选，填写图标链接               | ❓   |

---

## 🖼 示例效果

```html
<a href="https://beian.miit.gov.cn/" target="_blank">京ICP备04000001号-2</a>
<a
  href="https://beian.mps.gov.cn/#/query/webSearch?code=11040102700068"
  target="_blank"
>
  <img src="图标地址" width="16" height="16" />
  京公网安备11040102700068号
</a>
```

## 📎 注意事项

- 插件会自动在 `<footer>` 输出备案信息，支持大多数主题；
- 若你的主题未调用 `Widget_Archive()->footer` 钩子，可在主题的 `footer.php` 手动添加：

```php
<?php if (class_exists('BeianFooter_Plugin')) BeianFooter_Plugin::render(); ?>
```

---

## 📄 许可协议

本插件遵循 MIT 开源协议，欢迎自由使用与修改。

---

## ❤️ 致谢

感谢你使用 BeianFooter 插件。如果你有更多建议或改进点，欢迎反馈或 PR！
