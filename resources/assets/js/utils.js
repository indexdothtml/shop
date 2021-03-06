String.hash = function (prefix = '') {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < 10; i++) text += possible.charAt(Math.floor(Math.random() * possible.length));

    return prefix + text;
};

Array.prototype.pluck = function (key) {
    return this.map(row => row[key]);
};