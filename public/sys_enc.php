<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active"><a href="#s8" data-toggle="tab">合成高</a></li>
        <li><a href="#s9" data-toggle="tab">合成中</a></li>
        <li><a href="#s10" data-toggle="tab">合成低</a></li>
        <li><a href="#s0" data-toggle="tab">VGA/HDMI</a></li>
        <li><a href="#s1" data-toggle="tab">SDI1</a></li>
        <li><a href="#s2" data-toggle="tab">SDI2</a></li>
        <li><a href="#s3" data-toggle="tab">SDI3</a></li>
        <li><a href="#s4" data-toggle="tab">SDI4</a></li>
        <li><a href="#s5" data-toggle="tab">SDI5</a></li>
        <li><a href="#s6" data-toggle="tab">SDI6</a></li>
        <li><a href="#s7" data-toggle="tab">网络流</a></li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="s8">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable8" type="checkbox"  id="enable8" >
                  <label for="enable8">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id8">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate8"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe8"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level8">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(8)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s9">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable9" type="checkbox"  id="enable9" >
                  <label for="enable9">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id9">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate9"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe9"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level9">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(9)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s10">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable10" type="checkbox"  id="enable10" >
                  <label for="enable10">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id10">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate10"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe10"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level10">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(10)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s0">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable0" type="checkbox"  id="enable0" >
                  <label for="enable0">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id0">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate0"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe0"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level0">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(0)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable1" type="checkbox"  id="enable1" >
                  <label for="enable1">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id1">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate1"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe1"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level1">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(1)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable2" type="checkbox"  id="enable2" >
                  <label for="enable2">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id2">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate2"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe2"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level2">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s3">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable3" type="checkbox"  id="enable3" >
                  <label for="enable3">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id3">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate3"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe3"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level3">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(3)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s4">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable4" type="checkbox"  id="enable4" >
                  <label for="enable4">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id4">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate4"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe4"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level4">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
              <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(4)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s5">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable5" type="checkbox"  id="enable5" >
                  <label for="enable5">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id5">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate5"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe5"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level5">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(5)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s6">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable6" type="checkbox"  id="enable6" >
                  <label for="enable6">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id6">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate6"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe6"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level6">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(6)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="s7">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable7" type="checkbox"  id="enable7" >
                  <label for="enable7">使能录制</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="wh_id7">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1920x1080</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">1280x720</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">960x540</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4">704x396</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">320x180</option>
                </select>
              </div>
              <div class="form-label">分辩率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="coderate7"></div>
              <div class="form-label">码率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="iframe7"></div>
              <div class="form-label">I帧间隔(1-8)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="level7">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">BaseLine Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">Main Profile</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">High Profile</option>
                </select>
              </div>
              <div class="form-label">Profile:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="encBtnClick(7)">更新配置</button>
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
$sql = "select * from T_VENC_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['VENC_ID'])) {
    if ($res['ENABLE'] > 0)
    {
      echo 'document.getElementById("enable' . $res['VENC_ID'] . '").checked=true;' . PHP_EOL;
    }
    echo 'jsSelectItemByValue(document.getElementById("wh_id' . $res['VENC_ID'] . '"),' . $res['WH_ID'] . ');' . PHP_EOL;
    echo 'jsSelectItemByValue(document.getElementById("level' . $res['VENC_ID'] . '"),' . $res['LEVEL'] . ');' . PHP_EOL;
    echo 'document.getElementById("coderate' . $res['VENC_ID'] . '").value="' . $res['CODERATE'] . '";' . PHP_EOL;
    echo 'document.getElementById("iframe' . $res['VENC_ID'] . '").value="' . $res['IFRAME'] . '";' . PHP_EOL;
  }
}
$db->close();
?>
  function encBtnClick(venc_id)
  {
    var params="";
    params+=venc_id+",";
    if(document.getElementById("enable"+venc_id).checked==true)
      params+="1,";
    else
      params+="0,";
    params+=document.getElementById("wh_id"+venc_id).value+",";
    params+=document.getElementById("coderate"+venc_id).value+",30,";
    params+=document.getElementById("iframe"+venc_id).value+",";
    params+=document.getElementById("level"+venc_id).value;
    ajaxGetData("actsys.php",2,params,HandleAjaxResult);
  }
  document.getElementById("nav3").style.color="#eee";
</script>
</body>
</html>