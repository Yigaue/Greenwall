/**
 * Column layouts available for each column option.
 */

import icons from './icons';

const { __ } = wp.i18n;

const columnLayouts = {
	/* 1 column layout. */
	1: [
		{
			name: __( '1 Column', 'genesis-blocks' ),
			key: 'gb-1-col-equal',
			col: 1,
			icon: icons.oneEqual,
		},
	],

	/* 2 column layouts. */
	2: [
		{
			name: __( '2 Columns - 50/50', 'genesis-blocks' ),
			key: 'gb-2-col-equal',
			col: 2,
			icon: icons.twoEqual,
		},
		{
			name: __( '2 Columns - 75/25', 'genesis-blocks' ),
			key: 'gb-2-col-wideleft',
			col: 2,
			icon: icons.twoLeftWide,
		},
		{
			name: __( '2 Columns - 25/75', 'genesis-blocks' ),
			key: 'gb-2-col-wideright',
			col: 2,
			icon: icons.twoRightWide,
		},
	],

	/* 3 column layouts. */
	3: [
		{
			name: __( '3 Columns - 33/33/33', 'genesis-blocks' ),
			key: 'gb-3-col-equal',
			col: 3,
			icon: icons.threeEqual,
		},
		{
			name: __( '3 Columns - 25/50/25', 'genesis-blocks' ),
			key: 'gb-3-col-widecenter',
			col: 3,
			icon: icons.threeWideCenter,
		},
		{
			name: __( '3 Columns - 50/25/25', 'genesis-blocks' ),
			key: 'gb-3-col-wideleft',
			col: 3,
			icon: icons.threeWideLeft,
		},
		{
			name: __( '3 Columns - 25/25/50', 'genesis-blocks' ),
			key: 'gb-3-col-wideright',
			col: 3,
			icon: icons.threeWideRight,
		},
	],

	/* 4 column layouts. */
	4: [
		{
			name: __( '4 Columns - 25/25/25/25', 'genesis-blocks' ),
			key: 'gb-4-col-equal',
			col: 4,
			icon: icons.fourEqual,
		},
		{
			name: __( '4 Columns - 40/20/20/20', 'genesis-blocks' ),
			key: 'gb-4-col-wideleft',
			col: 4,
			icon: icons.fourLeft,
		},
		{
			name: __( '4 Columns - 20/20/20/40', 'genesis-blocks' ),
			key: 'gb-4-col-wideright',
			col: 4,
			icon: icons.fourRight,
		},
	],

	/* 5 column layouts. */
	5: [
		{
			name: __( '5 Columns', 'genesis-blocks' ),
			key: 'gb-5-col-equal',
			col: 5,
			icon: icons.fiveEqual,
		},
	],

	/* 6 column layouts. */
	6: [
		{
			name: __( '6 Columns', 'genesis-blocks' ),
			key: 'gb-6-col-equal',
			col: 6,
			icon: icons.sixEqual,
		},
	],
};

export default columnLayouts;
