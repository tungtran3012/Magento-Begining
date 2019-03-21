define([
    'ko',
    'uiComponent',
    'mage/url',
    'mage/storage',
], function (ko, Component, urlBuilder,storage) {
    'use strict';
    var id=1;

    return Component.extend({

        defaults: {
            template: 'Packt_HelloWorld/test',
        },

        productList: ko.observableArray([]),

        getProduct: function () {
            var self = this;
            var serviceUrl = urlBuilder.build('helloworld/knockout/product?id='+id);
            id ++;
            return storage.post(
                serviceUrl,
                ''
            ).done(
                function (response) {
                    self.productList.push(JSON.parse(response));
                }
            ).fail(
                function (response) {
                    alert(response);
                }
            );
        },

    });
});

// define(['uiComponent'], function(Component) {
//
//     return Component.extend({
//         initialize: function () {
//             this._super();
//             this.time = Date();
//             //time is defined as observable
//             this.observe(['time']);
//             //periodically updater every second
//             setInterval(this.flush.bind(this), 1000);
//         },
//         flush: function(){
//             this.time(Date());
//         }
//     });
// });

//View-Model
// define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
//         'use strict';
//         return Component.extend({
//             defaults: {
//                 template: 'Packt_HelloWorld/knockout-test'
//             },
//             initialize: function () {
//                 this.customerName = ko.observableArray([]);
//                 this.customerData = ko.observable('');
//                 this._super();
//             },
//             addNewCustomer: function () {
//                 this.customerName.push({name:this.customerData()});
//                 this.customerData('');
//             }
//         });
//     }
// );