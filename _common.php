<script type="text/javascript">
	function keyNumber(){
		$(".number-only").val('');
		$(".number-only").keydown(function(e){
			if (!((e.keyCode >= 48 && e.keyCode <= 57) || e.keyCode == 8)) {
				e.preventDefault();
			}
		});
	}
	function checkPassword() {
		var pwd = $("#tb-password").val();
		var sc = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
		var num = /[1234567890]/;
		var capital = /[ABCDEFGHIJKLMNOPQRSTUVWXYZ]/;
		var error = '';
		var cntError = 0;

		if (pwd.length < 8) {
			error += '&bull; Must at least eight (8) characters long.<br/>';
			cntError += 1;
		}

		if (sc.test(pwd) == false || num.test(pwd) == false) {
			error += '&bull; Must have at least one(1) numeric and special character.<br/>';
			cntError += 1;
		}

		if (capital.test(pwd) == false) {
			error += '&bull; Must have at least one(1) capital letter.<br/>';
			cntError += 1;
		}

		if (cntError > 0) {
			$("#tb-password").parent().addClass('has-error');
			$("#panel-error").html(error);
			$("#panel-error").show();
		} else {
			$("#tb-password").parent().removeClass('has-error');
			$("#panel-error").html('');
			$("#panel-error").hide();
		}
	}

	function confirmPassword() {
		var pwd = $("#tb-password").val();
		var conpwd = $("#tb-confirm-password").val();
		var error = true;

		if (pwd != conpwd) {
			$("#tb-confirm-password").parent().addClass('has-error');
			$("#panel-not-match").show();
		} else {
			$("#tb-confirm-password").parent().removeClass('has-error');
			$("#panel-not-match").hide();
		}
	}
</script>