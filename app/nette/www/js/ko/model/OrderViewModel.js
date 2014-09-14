define(['knockout', 'jquery'], function(ko, $) {
    function OrderViewModel(params) {

        var self = this;

        this.url = params.url;
        this.orders = ko.observableArray();    

        $.ajax(this.url, {}, function(data) {
            self.orders(data);
        });
    };
    return OrderViewModel;
});   