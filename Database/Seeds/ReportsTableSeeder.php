<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Raffles\Modules\Linkre\Models\Report;

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $report1 = Report::create(
            [
                'body' => 'On behalf of Urban Land Institute (ULI), an internationally recognized commercial real estate non-profit, we invite you to review The Investors Guide to Commercial Real Estate. Commercial real estate is recognized as an attractive asset class by institutional investors because of its high cash-flow stream, diversification benefits, and potential to hedge inflation.',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('Developers Tap New Sources of Financing'),
                'title' => 'Developers Tap New Sources of Financing',
            ]
        );

        $report2 = Report::create(
            [
                'body' => 'The big questions on everyone\'s mind are, "What do low oil prices mean?" and "Will they remain low?" The volatility of crude prices has increased since 1994. From 1964-1993, the standard deviation of real crude prices was $24 per barrel.',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('Linneman Letter - Spring 2015'),
                'title' => 'Linneman Letter - Spring 2015',
            ]
        );

        $report3 = Report::create(
            [
                'body' => 'Crowdfunding platforms continue to gain momentum as a viable means for investors to identify real estate investment opportunities, and for real estate firms to raise capital and manage investors online.',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('3 Types of Real Estate Crowdfunding Websites'),
                'title' => '3 Types of Real Estate Crowdfunding Websites',
            ]
        );

        $report4 = Report::create(
            [
                'body' => 'The Securities and Exchange Commission’s (SEC) Advisory Committee on Small and Emerging Companies met in early June to discuss various topics concerning, of course, small businesses. One of the primary topics the Committee addressed was the growing enactment and use of state-based crowdfunding (i.e. “Intrastate crowdfunding”) and how the SEC can, and should, support those efforts by modernizing Rule 147.',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('SEC Advisory Committee Recommends Modernizing Rule 147 To Support Intrastate Crowdfunding'),
                'title' => 'SEC Advisory Committee Recommends Modernizing Rule 147 To Support Intrastate Crowdfunding',
            ]
        );

        $report5 = Report::create(
            [
                'body' => 'Commercial real estate professionals live and breathe capitalization rates. Every trade publication, market participant, and third-party report relating to real estate quotes cap rates for various markets and properties. But ask a group of real estate professionals to calculate a specific property’s cap rate and you are likely to get a variety of answers — despite the simplicity of the formula. If cap rates are widely used and easily calculated, then why does everyone come up with a different answer?',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('Cap Rate Variations'),
                'title' => 'Cap Rate Variations',
            ]
        );

        $report6 = Report::create(
            [
                'body' => 'On behalf of Urban Land Institute (ULI), an internationally recognized commercial real estate non-profit, we invite you to review The Investors Guide to Commercial Real Estate. Commercial real estate is recognized as an attractive asset class by institutional investors because of its high cash-flow stream, diversification benefits, and potential to hedge inflation.',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('The Investor’s Guide to Commercial Real Estate'),
                'title' => 'The Investor’s Guide to Commercial Real Estate',
            ]
        );
    }
}
