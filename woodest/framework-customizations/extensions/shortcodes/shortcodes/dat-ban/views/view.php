<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	$page_class = isset( $atts['page_class'] ) && $atts['page_class'] !='' ? $atts['page_class'] : '';
	$title = isset( $atts['title'] ) && $atts['title'] !='' ? $atts['title'] : '';
	$desscription = isset( $atts['desscription'] ) && $atts['desscription'] !='' ? $atts['desscription'] : '';
	$title_1 = isset( $atts['title_1'] ) && $atts['title_1'] !='' ? $atts['title_1'] : '';
	$content_1 = isset( $atts['content_1'] ) && $atts['content_1'] !='' ? $atts['content_1'] : '';
	$title_2 = isset( $atts['title_2'] ) && $atts['title_2'] !='' ? $atts['title_2'] : '';
	$content_2 = isset( $atts['content_2'] ) && $atts['content_2'] !='' ? $atts['content_2'] : '';
	$title_3 = isset($atts['title_3']) && $atts['title_3'] !='' ? $atts['title_3'] : '';
	$content_3 = isset( $atts['content_3'] ) && $atts['content_3'] !='' ? $atts['content_3'] : '';
?>
	
<?php

  if(isset($_POST['Submit'])){

	global $wpdb;

	$name = $_POST['aname'];
	$ngaythang = $_POST['angaythang']; 
	$thoigian = $_POST['athoigian'];
	$soluongnguoi = $_POST['asoluongnguoi']; 
	$phone = $_POST['aphone']; 
	$email = $_POST['aemail'];
	$notes = $_POST['anotes'];
if($name == NULL || $ngaythang == NULL || $thoigian == NULL || $soluongnguoi == NULL || $phone == NULL || $email == NULL)
{
	echo "Các thông tin bạn điền chưa đầy đủ xin vui lòng kiểm tra lại ! <a href='". home_url()."/dat-ban/'>Trở về</a><br/>";
}
else if($wpdb->insert(   
    'wp_wpcm',
    array(
        'name' => $name,
        'ngaythang' => $ngaythang, 
        'thoigian' => $thoigian,
        'soluongnguoi' => $soluongnguoi, 
        'phone' => $phone, 
        'email' => $email,
        'notes' => $notes
        )
) == false) wp_die('Có lỗi sảy ra khi dặt bàn ! xin vui lòng liên hệ với chúng tôi để báo lỗi !');
    else echo "Đặt bàn thành công ! chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất ! <a href='". home_url()."'>Trở về trang chủ</a><br/>";

?>
<?php
}
else //else we didnt submit the form, so display the form
{
?>
<div class="row">
	<form action="" method="post" id="addcourse">
		<div class="form-group clearfix row">
			<div class="col-md-4 col-sm-6 col-xs-6 padding-bottom">
					<input class="form-control" type="text" placeholder="Ngày Tháng" type="text" name="angaythang" size="30" required/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6 padding-bottom">
					<input class="form-control" placeholder="Thời gian" type="text" name="athoigian" size="30" required/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6 padding-bottom">
				<input class="form-control" placeholder="Số lượng người" type="number" name="asoluongnguoi" size="30" required/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6 padding-bottom">
				<input class="form-control" placeholder="Họ và tên" type="text" name="aname" size="30" required/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6 padding-bottom">
					<input class="form-control" placeholder="Email" type="email" name="aemail" size="30" required/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6 padding-bottom">
					<input class="form-control" placeholder="Số điện thoại" type="number" name="aphone" size="30" required/>
			</div>
		</div>
		<div class="form-group clearfix row">
			<div class="col-md-12">
				<textarea class="form-control" type="text" name="anotes" cols="46" rows="5" placeholder="Nội dung" ng-maxlength="500" ></textarea>
			</div>
		</div>
		<div class="form-group margin-auto clearfix row">
			<p>Sau 17h quý khách vui lòng gọi trực tiếp +84 2838 217 7</p>
			<div class="col-md-12">
				<button type="Submit" class="nutdatban" name="Submit"> Đặt bàn</button>
			</div>
		</div>
	</form>
</div>
<?php
}

{
}
?>