#
# Table structure for table 'tx_devnulladdr_address'
#
CREATE TABLE tx_devnulladdr_address (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	type int(11) unsigned DEFAULT '0' NOT NULL,
	label tinytext NOT NULL,
	status int(11) DEFAULT '0' NOT NULL,
	data_source tinytext NOT NULL,
	external_id tinytext NOT NULL,
	contact_permission int(11) unsigned DEFAULT '0' NOT NULL,
	fe_user blob NOT NULL,
	image blob NOT NULL,
	preceding_title tinytext NOT NULL,
	title int(11) unsigned DEFAULT '0' NOT NULL,
	letter_title tinytext NOT NULL,
	first_name tinytext NOT NULL,
	middle_name tinytext NOT NULL,
	last_name_prefix tinytext NOT NULL,
	name tinytext NOT NULL,
	maiden_name tinytext NOT NULL,
	general_suffix tinytext NOT NULL,
	initials tinytext NOT NULL,
	org_name tinytext NOT NULL,
	org_type int(11) unsigned DEFAULT '0' NOT NULL,
	org_legal_form int(11) unsigned DEFAULT '0' NOT NULL,
	department tinytext NOT NULL,
	building tinytext NOT NULL,
	floor tinytext NOT NULL,
	room tinytext NOT NULL,
	street tinytext NOT NULL,
	street_number tinytext NOT NULL,
	postal_code tinytext NOT NULL,
	locality tinytext NOT NULL,
	admin_area tinytext NOT NULL,
	country int(11) unsigned DEFAULT '0' NOT NULL,
	po_number tinytext NOT NULL,
	po_no_number tinyint(3) unsigned DEFAULT '0' NOT NULL,
	po_postal_code tinytext NOT NULL,
	po_locality tinytext NOT NULL,
	po_admin_area tinytext NOT NULL,
	po_country int(11) unsigned DEFAULT '0' NOT NULL,
	formation_date int(11) DEFAULT '0' NOT NULL,
	closure_date int(11) DEFAULT '0' NOT NULL,
	birth_date int(11) DEFAULT '0' NOT NULL,
	birth_place tinytext NOT NULL,
	death_date int(11) DEFAULT '0' NOT NULL,
	death_place tinytext NOT NULL,
	gender int(11) unsigned DEFAULT '0' NOT NULL,
	marital_status int(11) unsigned DEFAULT '0' NOT NULL,
	nationality int(11) unsigned DEFAULT '0' NOT NULL,
	religion int(11) unsigned DEFAULT '0' NOT NULL,
	mother_tongue int(11) unsigned DEFAULT '0' NOT NULL,
	preferred_language int(11) unsigned DEFAULT '0' NOT NULL,
	join_date int(11) DEFAULT '0' NOT NULL,
	leave_date int(11) DEFAULT '0' NOT NULL,
	occupation int(11) unsigned DEFAULT '0' NOT NULL,
	hobbies int(11) unsigned DEFAULT '0' NOT NULL,
	field_visibility blob NOT NULL,
	remarks text NOT NULL,
	relationships_overview text NOT NULL,
	contact_info text NOT NULL,	
	map_icon int(11) DEFAULT '0' NOT NULL,
	latitude decimal(14,8) DEFAULT '0.00000000',
	longitude decimal(14,8) DEFAULT '0.00000000',
	cat_maps int(11) NOT NULL DEFAULT '0',
	marker_text text NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_devnulladdr_contact'
#
CREATE TABLE tx_devnulladdr_contact (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	uid_foreign tinytext NOT NULL,
	type int(11) unsigned DEFAULT '0' NOT NULL,
	nature int(11) unsigned DEFAULT '0' NOT NULL,
	standard tinyint(3) unsigned DEFAULT '0' NOT NULL,
	label tinytext NOT NULL,
	country int(11) unsigned DEFAULT '0' NOT NULL,
	area_code tinytext NOT NULL,
	number tinytext NOT NULL,
	extension tinytext NOT NULL,
	email tinytext NOT NULL,
	url tinytext NOT NULL,
	remarks text NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


#
# Table structure for table 'tx_devnulladdr_contact_perm'
#
CREATE TABLE tx_devnulladdr_contact_perm (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	cp_short tinytext NOT NULL,
	cp_descr tinytext NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


#
# Table structure for table 'tx_devnulladdr_occupation'
#
CREATE TABLE tx_devnulladdr_occupation (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	oc_short tinytext NOT NULL,
	oc_descr tinytext NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


#
# Table structure for table 'tx_devnulladdr_org_legal'
#
CREATE TABLE tx_devnulladdr_org_legal (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	lf_short tinytext NOT NULL,
	lf_descr tinytext NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


#
# Table structure for table 'tx_devnulladdr_org_type'
#
CREATE TABLE tx_devnulladdr_org_type (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	ot_short tinytext NOT NULL,
	ot_descr tinytext NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


#
# Table structure for table 'devnulladdr_addr_status'
#
CREATE TABLE tx_devnulladdr_addr_status (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	st_short tinytext NOT NULL,
	st_descr tinytext NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


#
# Table structure for table 'tx_devnulladdr_addr_title'
#
CREATE TABLE tx_devnulladdr_addr_title (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	ti_short tinytext NOT NULL,
	ti_descr tinytext NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_devnulladdr_layers'
#
CREATE TABLE tx_devnulladdr_map_layers (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	addresses int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


CREATE TABLE tx_devnulladdr_map_layers_mm (
	uid_local int(11) NOT NULL DEFAULT '0',
	uid_foreign int(11) NOT NULL DEFAULT '0',
	matchfield varchar(30) NOT NULL DEFAULT '',
	tablenames varchar(30) NOT NULL DEFAULT '',
	sorting int(11) NOT NULL DEFAULT '0',
	
	INDEX uid_local (uid_local),
	INDEX uid_foreign (uid_foreign)
);


CREATE TABLE tx_devnulladdr_map_icon_file (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	title tinytext NOT NULL,
	icon_file tinytext NOT NULL,
	anchor_x int(11) DEFAULT '0' NOT NULL,
	anchor_y int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


CREATE TABLE tx_devnulladdr_kml_file (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	type int(11) unsigned DEFAULT '0' NOT NULL,
	title tinytext,
	kml_file text,
	kml_url text,
	kml_suppress tinyint(4) unsigned DEFAULT '0' NOT NULL,
	kml_preserve tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

