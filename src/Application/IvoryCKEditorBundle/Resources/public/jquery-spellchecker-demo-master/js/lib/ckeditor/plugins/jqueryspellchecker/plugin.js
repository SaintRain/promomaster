﻿/*
 * jQuery Spellchecker - CKeditor Plugin - v0.2.4
 * https://github.com/badsyntax/jquery-spellchecker
 * Copyright (c) 2012 Richard Willis; Licensed MIT
 */

CKEDITOR.plugins.add('jqueryspellchecker', {

 config: {
    lang: 'ru,eng',        // YANDEX: установите русский и английский языки
    parser: 'html', 
    webservice: {
      path: '/bundles/applicationivoryckeditor/jquery-spellchecker-demo-master/webservices/php/SpellChecker.php', // YANDEX: подправьте абсолютный путь
      driver: 'yandex' // YANDEX: подключите драйвер Яндекс.Спеллера
    },
    suggestBox: {
      position: 'below',
      appendTo: 'body'
    }
    
  },  

  init: function( editor ) {

    var t = this;
    var pluginName = 'jqueryspellchecker';

    this.config.suggestBox.position = this.positionSuggestBox();
    
    editor.addCommand(pluginName, {
      canUndo: false,
      readOnly: 1,
      exec: function() {
        t.toggle(editor);
      }
    });

    editor.ui.addButton('jQuerySpellChecker', {
      label: 'Проверить орфографию яндексом',
      icon: 'spellchecker',
      command: pluginName,
//      toolbar: 'spellchecker'
    });

    editor.on('saveSnapshot', function() {
      t.destroy();
    });
  },

  create: function() {

    this.editor.setReadOnly(true);
    this.editor.commands.jqueryspellchecker.toggleState();
    this.editorWindow = this.editor.document.getWindow().$;

    this.createSpellchecker();
    this.spellchecker.check();
    
    $(this.editorWindow)
    .on('scroll.spellchecker', $.proxy(function scroll(){
      if (this.spellchecker.suggestBox) {
        this.spellchecker.suggestBox.close();
      }
    }, this));
  },

  destroy: function() {
      console.log('destroy');
    if (!this.spellchecker) 
      return;
    this.spellchecker.destroy();
    this.spellchecker = null;
    this.editor.setReadOnly(false);
    this.editor.commands.jqueryspellchecker.toggleState();
    $(this.editorWindow).off('.spellchecker');
  },

  toggle: function(editor) {
      //небольшой кастыль, чтобы можно было использовать перевод в нескольких окнах на одной странице
      if (this.editor && this.editor.name!=editor.name) {
      this.destroy();    
      }
      
    this.editor = editor;
    if (!this.spellchecker) {
      this.create();
    } else {
      this.destroy();
    }
  },

  createSpellchecker: function() {
    var t = this;

    t.config.getText = function() {
      return $('<div />').append(t.editor.getData()).text();
    };

    t.spellchecker = new $.SpellChecker(t.editor.document.$.body, this.config);

    t.spellchecker.on('check.success', function() {
      alert('Ошибок в тексте не найдено.');
      t.destroy();
    });
    t.spellchecker.on('replace.word', function() {
      if (t.spellchecker.parser.incorrectWords.length === 0) {
        t.destroy();
      }
    });
  },

  positionSuggestBox: function() {

    var t = this;

    return function() {

      var ed = t.editor;
      var word = (this.wordElement.data('firstElement') || this.wordElement)[0];

      var p1 = $(ed.container.$).find('iframe').offset();
      var p2 = $(ed.container.$).offset();
      var p3 = $(word).offset();

      var left = p3.left + p2.left;
      var top = p3.top + p2.top + (p1.top - p2.top) + word.offsetHeight;

      top -= $(t.editorWindow).scrollTop();

      this.container.css({ 
        top: top, 
        left: left  
      });
    };
  }
});
