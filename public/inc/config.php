<?php
define("CSDB","./cst.db");

define("CMD_SET_SYS",1);
define("SUB_SYS_DBAUTO",1);
define("SUB_SYS_RECMODE",2);
define("SUB_SYS_MISC",3);
define("SUB_SYS_TID",4);
define("SUB_IIR_SET",5);
define("SUB_SYS_VM",100);

define("CMD_SET_AIN",10);
define("SUB_AIN_PARAM",1);
define("SUB_AIN_VOL",2);

define("CMD_SET_AOUT",20);
define("SUB_AOUT_PARAM",1);
define("SUB_AOUT_VOL",2);

define("CMD_SET_VIN",30);
define("SUB_VIN_VIT",1);
define("SUB_VIN_FMT",2);

define("CMD_SET_VOUT",40);
define("SUB_VOUT_PARAM",1);
define("SUB_VOUT_CH1",2);
define("SUB_VOUT_HDMI1",3);

define("CMD_SET_VENC",50);
define("SUB_VENC_PARAM",1);

define("CMD_SET_VCOM",60);
define("SUB_VCOM_PARAM",1);
define("SUB_VCOM_CH",2);
define("SUB_VCOM_MODE1",3);
define("SUB_VCOM_MODE2",4);

define("CMD_SET_TB",70);
define("SUB_TB_PARAM",1);
define("SUB_TB_EN",2);
define("SUB_TB_POS",3);
define("SUB_TB_GEN",4);

define("CMD_SET_TIT",80);
define("SUB_TIT_PARAM",1);
define("SUB_TIT_EN",2);
define("SUB_TIT_GEN",3);

define("CMD_SET_HT",90);
define("SUB_HT_PARAM",1);
define("SUB_HT_EN",2);
define("SUB_HT_PIC",3);

define("CMD_SET_REC",100);
define("SUB_REC_CTRL",1);
define("SUB_REC_NAME",2);

define("CMD_SET_LIVE",110);
define("SUB_LIVE_PARAM",1);
define("SUB_LIVE_EN",2);

define("CMD_SET_DEC",120);
define("CMD_SET_INT",130);
define("SUB_INT_RS",1);
define("SUB_INT_UDP",2);

define("CMD_SET_PTZ",140);
define("SUB_PTZ_PARAM",1);
define("SUB_PTZ_CTRL",2);
define("SUB_PTZ_GETPOS",3);
define("SUB_PTZ_SETPOS",4);

define("CMD_SET_FTP",150);
define("SUB_FTP_SVR",1);
define("SUB_FTP_AUTO",2);

define("CMD_SET_CTRL",160);
define("CMD_SET_TRACK",170);
define("SUB_TRACK_VGALK",1);
define("SUB_TRACK_UP2",2);
define("SUB_TRACK_UP3",3);
define("SUB_TRACK_UP4",4);
define("SUB_TRACK_UP5",5);
define("SUB_TRACK_UP6",6);
define("SUB_TRACK_UP7",7);
define("SUB_TRACK_UP8",8);
define("SUB_TRACK_UP9",9);
define("SUB_TRACK_UP10",10);
define("SUB_TRACK_DEBUG",11);

define("PTZ_LEFT",00);
define("PTZ_LEFTUP",01);
define("PTZ_UP",02);
define("PTZ_RIGHTUP",03);
define("PTZ_RIGHT",04);
define("PTZ_RIGHTDOWN",05);
define("PTZ_DOWN",06);
define("PTZ_LEFTDOWN",07);
define("PTZ_ZOOMIN",08);
define("PTZ_ZOOMOUT",09);
define("PTZ_PTSTOP",10);
define("PTZ_ZOOMSTOP",11);
define("PTZ_RESETPOS",12);
define("PTZ_SETPOS",13);
define("PTZ_RECALLPOS",14);

?>