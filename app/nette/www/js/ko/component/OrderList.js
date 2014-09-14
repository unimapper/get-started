define(['knockout', 'text!./OrderList.html', 'jquery'], function(ko, htmlString, $) {
    return {
        viewModel: function(params) {

            var self = this;

            this.url = params.url;
            this.orders = ko.observableArray();

            $.get(this.url, function(data) {
                self.orders(data.body);
            });
        },
        template: htmlString
    };
});