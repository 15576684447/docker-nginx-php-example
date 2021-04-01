<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#com1" data-toggle="tab">单分屏</a>
        </li>
        <li>
          <a href="#com2" data-toggle="tab">双分屏</a>
        </li>
        <li>
          <a href="#com3" data-toggle="tab">画外画</a>
        </li>
        <li>
          <a href="#com4" data-toggle="tab">画中画</a>
        </li>
        <li>
          <a href="#com5" data-toggle="tab">1+2分屏</a>
        </li>
        <li>
          <a href="#com6" data-toggle="tab">四分屏</a>
        </li>
        <li>
          <a href="#com7" data-toggle="tab">六分屏</a>
        </li>
        <li>
          <a href="#com8" data-toggle="tab">八分屏</a>
        </li>

      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="com1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/ct0.png"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch1_0">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口1输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="comBtnClick(1,1)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="com2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/ct1.png"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch2_0">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口1输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch2_1">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口2输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="comBtnClick(2,2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="com3">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/ct2.png"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch3_0">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口1输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch3_1">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口2输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="comBtnClick(3,2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="com4">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/ct3.png"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch4_0">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口1输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch4_1">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口2输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="comBtnClick(4,2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="com5">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/ct4.png"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch5_0">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口1输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch5_1">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口2输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch5_2">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口3输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="comBtnClick(5,3)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="com6">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/ct5.png"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch6_0">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口1输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch6_1">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口2输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch6_2">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口3输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch6_3">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口4输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="comBtnClick(6,4)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="com7">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/ct7.png"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch7_0">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口1输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch7_1">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口2输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch7_2">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口3输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch7_3">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口4输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch7_4">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口5输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch7_5">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口6输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="comBtnClick(7,6)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="com8">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/ct8.png"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch8_0">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口1输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch8_1">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口2输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch8_2">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口3输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch8_3">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口4输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch8_4">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口5输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch8_5">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口6输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch8_6">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口7输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ch8_7">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
                </select>
              </div>
              <div class="form-label">窗口8输入源:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="comBtnClick(8,8)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="clear"></div>
<div class="widget-container boxed vh-style0">
<div class="inner vh-center">
  <span>Powered By <?php echo constant("CORP"); ?></span>
</div>
</div>
</div>
<!--/ container -->
</div>
<script>
<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
//$db = new SQLite3(constant("CSDB"));
$db = new MyDB();
$sql = "select COM_ID,WINNUM,WIN0_CH,WIN1_CH,WIN2_CH,WIN3_CH,WIN4_CH,WIN5_CH,WIN6_CH,WIN7_CH from T_COM_PARAM where COM_ID<9;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['COM_ID'])) {
    for ($i = 0; $i < $res['WINNUM']; $i++) {
      echo 'jsSelectItemByValue(document.getElementById("ch' . ($res['COM_ID'] ) . '_' . $i . '"),' . $res['WIN' . $i . '_CH'] . ');' . PHP_EOL;
    }
  }
}
$db->close();
?>
  function comBtnClick(idx,num)
  {
    var arr=new Array();
    var params="";
    params+=idx;
    for(var i=0;i<num;i++)
    {
      params+=",";
      _ch=document.getElementById("ch"+String(idx)+"_"+String(i)).value;
      params+=_ch;
      if(_ch!=255) arr.push(_ch);
    }
    for(;i<8;i++)
      params+=",255";
    var sarr=arr.sort();
    for(i=0;i<sarr.length-1;i++)
    {
      if(sarr[i]==sarr[i+1])
      {
        alert("更新失败，不同子窗口不可使用同一输入源！");
        return false;
      }
    }
    ajaxGetData("actsys.php",4,params,HandleAjaxResult);
  };
  document.getElementById("nav4").style.color="#eee";
</script>
</body>
</html>