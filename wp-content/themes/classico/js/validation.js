$(document).ready(function() {
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  
  // 送信の同意チェックボックス（f_item_select7[]）がページ内に存在するか判定
  function hasAgreementField() {
    return $('input[name="f_item_select7[]"]').length > 0;
  }

  // 個別の入力・選択フィールドを検証する関数
  function validateField($field) {
    let isValid = true;
    let errorMsg = '';

    // 1. 送信の同意チェックボックス（name="f_item_select7[]"）の場合
    if ($field.attr('name') === 'f_item_select7[]' || $field.hasClass('required-agree')) {
      // そもそもフォーム内に存在する場合のみチェック判定を行う
      if (hasAgreementField()) {
        const isChecked = $('input[name="f_item_select7[]"]').is(':checked');
        if (!isChecked) {
          isValid = false;
          errorMsg = '送信するには同意が必要です。';
        }
      }
      const $errorSpan = $field.closest('.form-group').find('.error-msg');
      toggleErrorState($field, $errorSpan, isValid, errorMsg);
    }
    // 2. 複数選択のチェックボックスグループ（同意以外）の場合
    else if ($field.is('[type="checkbox"]') && $field.hasClass('required-group')) {
      const name = $field.attr('name');
      const $checkboxGroup = $(`input[name="${name}"]`);
      const isChecked = $checkboxGroup.is(':checked');

      if (!isChecked) {
        isValid = false;
        errorMsg = '少なくとも1つ選択してください。';
      }
      const $errorSpan = $field.closest('.form-group').find('.error-msg');
      toggleErrorState($checkboxGroup, $errorSpan, isValid, errorMsg);
    }
    // 3. セレクトボックスの場合
    else if ($field.is('select')) {
      const val = $field.val();
      if ($field.hasClass('required') && (val === '' || val === null)) {
        isValid = false;
        errorMsg = '項目を選択してください。';
      }
      const $errorSpan = $field.siblings('.error-msg');
      toggleErrorState($field, $errorSpan, isValid, errorMsg);
    } 
    // 4. 通常のテキスト入力やメールアドレスの場合
    else {
      const val = $field.val().trim();
      if ($field.hasClass('required') && val === '') {
        isValid = false;
        errorMsg = 'この項目は入力必須です。';
      } else if ($field.attr('type') === 'email' && val !== '') {
        if (!emailRegex.test(val)) {
          isValid = false;
          errorMsg = '正しいメールアドレスの形式で入力してください。';
        }
      }
      const $errorSpan = $field.siblings('.error-msg');
      toggleErrorState($field, $errorSpan, isValid, errorMsg);
    }

    return isValid;
  }

  // エラー状態の見た目とメッセージを切り替える共通処理
  function toggleErrorState($element, $errorSpan, isValid, errorMsg) {
    if (!isValid) {
      $element.addClass('is-invalid');
      $errorSpan.text(errorMsg).fadeIn(200);
    } else {
      $element.removeClass('is-invalid');
      $errorSpan.fadeOut(200, function() {
        $(this).text('');
      });
    }
  }

  // フォーム全体のバリデーション状態をチェックし、送信ボタンを制御
  function toggleSubmitButton() {
    let formIsValid = true;

    // A. 単一の必須項目（required）をチェック
    $('.required').each(function() {
      const $this = $(this);

      if ($this.is('select')) {
        const val = $this.val();
        if (val === '' || val === null) {
          formIsValid = false;
        }
      } else {
        const val = $this.val().trim();
        if (val === '') {
          formIsValid = false;
        }
        if ($this.attr('type') === 'email' && !emailRegex.test(val)) {
          formIsValid = false;
        }
      }
    });

    // B. 必須チェックボックス（複数グループ）をチェック
    const checkedGroups = {};
    $('.required-group').each(function() {
      const name = $(this).attr('name');
      if (name !== 'f_item_select7[]') { // 同意用のnameは除外して判定
        if (!checkedGroups[name]) {
          checkedGroups[name] = $(`input[name="${name}"]`).is(':checked');
        }
      }
    });
    for (const groupName in checkedGroups) {
      if (!checkedGroups[groupName]) {
        formIsValid = false;
      }
    }

    // C. 送信の同意チェックボックス（name="f_item_select7[]"）をチェック
    if (hasAgreementField()) {
      const isAgreeChecked = $('input[name="f_item_select7[]"]').is(':checked');
      if (!isAgreeChecked) {
        formIsValid = false;
      }
    }

    // ボタンの有効・無効化切り替え
    const $submitBtn = $('#send');
    if (formIsValid) {
      $submitBtn.prop('disabled', false).addClass('is-active');
    } else {
      $submitBtn.prop('disabled', true).removeClass('is-active');
    }
  }

  // イベント登録：すべての必須クラスを監視
  $('.required, .required-group, .required-agree').on('blur input change', function() {
    validateField($(this));
    toggleSubmitButton();
  });
});