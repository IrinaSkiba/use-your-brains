(function(){  //объявляется функция
    'use strict'; //запускает "строгий режим", действующий внутри функции, что позволяет снизить вероятность ошибок

    var amd = {}, //создаются 3 объекта
        modules = {},
        definitions = {};

    amd.require = function(name){ 
        if (modules.hasOwnProperty(name)) { //проверка на содержание в объекте "modules" свойства "name"
            return modules[name]; //возвращаем значение
        }

        if (!definitions.hasOwnProperty(name)) { //проверка на отсутствие в объекте "definitions" свойства "name"
            throw new Error('Module is not registered: "' + name + '"'); //если не содержит, бросаем ошибку
        }

        var args = [], //создаём массив "args"
            definition = definitions[name];

        definition.deps.forEach(function(dep){ //перебираем массив 
            args.push(amd.require(dep)); //добавляем элементы, и возвращает новую длину массива
        });

        modules[name] = definition.factory.apply(null, args); //объекту "modules" присваиваем новое значение - вызов функции со значением null и аргументами, предоставленными в массиве "args"

        return modules[name]; //возвращаем значение
    }

	
    amd.define = function(name, deps, factory){ 
        if (definitions.hasOwnProperty(name)) { //проверка на содержание в объекте "definitions" свойства "name"
            throw new Error('Module already registered: "' + name + '"'); //если содержит, бросаем ошибку
        }

        if (!/^[a-zA-Z0-9\/_]+$/.test(name)) { //проверка регулярным выражением на отсутствие букв, цифр, слешей, подчеркиваний от начала строки и до конца строки от 1 и более раз
            throw new Error('Invalid module name: "' + name + '"'); //если отсутствуют, бросаем ошибку
        }

        if (!(deps instanceof Array)) { //проверка, принадлежит ли объект deps классу Array
            throw new Error('Module dependencies is not an array: "' + name + '"'); //если не содержит, бросаем ошибку
        }

        if (typeof factory !== 'function') { //проверка, не является ли "factory" функцией
            throw new Error('Module factory is not a function: "' + name + '"'); //если не является, бросаем ошибку
        }

        definitions[name] = {
            deps: deps,
            factory: factory,
        }

        return this; //возвращаем результат
    }

    window.amd = amd;
})();