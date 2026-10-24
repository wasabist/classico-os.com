/* vaildation
------------------------------------- */
$(function(){
$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
      var check = false;
      return this.optional(element) || regexp.test(value);
    },
    "無効な文字があります。"
  );

	$('#form_1').validate({
		rules: {
			f_item_company_name: {
				required: true,
				minlength: 1,
			},
			f_item_title: {
				required: true,
				minlength: 1,
			},
			f_item_name_last: {
				required: true,
				minlength: 1,
				// regex: /[^\x01-\x7E\uFF61-\uFF9F]/,
				regex: /^[^ -~｡-ﾟ]+$/,
			},
			f_item_name_first: {
				required: true,
				minlength: 1,
				regex: /^[^ -~｡-ﾟ]+$/,
			},
			f_item_mail: {
				required: true,
				email: true,
				minlength: 1,
			},
			f_item_tel: {
				required: true,
				number: true,
				minlength: 9,
			},
			f_item_free4: {
				required: true,
			},
			'f_item_select7[]': {
				required: true,
			},
		},
		messages: {
			f_item_company_name: {
				required: "会社・組織名を入力してください。",
			},
			f_item_title: {
				required: "役職名を入力してください。",
			},
			f_item_name_last: {
				required: "お名前（性）を入力してください。",
			},
			f_item_name_first: {
				required: "お名前（名）を入力してください。",
			},
			f_item_mail: {
				required: "メールアドレスを入力してください。",
				email: "メールアドレスの形式が正しくありません。",
			},
			f_item_tel: {
				required: "電話番号を入力してください。",
				number: "電話番号はハイフン(-)なしの数字のみで入力してください。",
				minlength: "電話番号の形式が正しくありません。",
			},
			f_item_free4: {
				required: "お問い合わせ内容を入力してください。",
			},
			'f_item_select7[]': {
				required: "同意は必須です。",
			},
		},
	})
});