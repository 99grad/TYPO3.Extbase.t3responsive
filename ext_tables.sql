#
# Table structure for table 'tt_content'
#

CREATE TABLE tt_content (

	tx_t3responsive_imgfloat TINYINT(1) DEFAULT '0',
	
	tx_t3responsive_imgwidth text NOT NULL,
	tx_t3responsive_imgwidthxs text NOT NULL,
	tx_t3responsive_imgwidthsm text NOT NULL,
	tx_t3responsive_imgwidthmd text NOT NULL,
	tx_t3responsive_imgwidthlg text NOT NULL,

	tx_t3responsive_hidexs TINYINT(1) DEFAULT '0',
	tx_t3responsive_hidesm TINYINT(1) DEFAULT '0',
	tx_t3responsive_hidemd TINYINT(1) DEFAULT '0',
	tx_t3responsive_hidelg TINYINT(1) DEFAULT '0'
	
	#spaceBefore SMALLINT( 5 ) NULL DEFAULT  '0'
);


#
# Table structure for table 'sys_file_reference'
#

CREATE TABLE sys_file_reference (
	tx_t3responsive_fp_zoom int(11) DEFAULT '0' NOT NULL
);


#
# Table structure for table 'pages'
#
CREATE TABLE pages (
	tx_t3responsive_hidexs TINYINT(1) DEFAULT '0',
	tx_t3responsive_hidesm TINYINT(1) DEFAULT '0',
	tx_t3responsive_hidemd TINYINT(1) DEFAULT '0',
	tx_t3responsive_hidelg TINYINT(1) DEFAULT '0'
);