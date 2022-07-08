const path = require("path");

module.exports = {
    devServer: {
        proxy: "http://127.0.0.1:8088"

    },
    outputDir: 'public',
    indexPath: '../templates/main.html',
    chainWebpack: config => {
        config
            .entry("app")
            .clear()
            .add("./assets/main.js")
            .end();
        config.resolve.alias
            .set("@", path.join(__dirname, "./assets"));
        config
            .plugin('html')
            .tap(args => {
                return [{template: 'assets/index.html'}]
            });
        config.plugin('copy').tap(([options])=> {
            options[0].ignore.push('public/index.php')
            return [options]
        });
    }
}