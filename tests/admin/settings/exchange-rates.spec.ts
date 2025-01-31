import { test, expect, config } from '../../utils/setup';

test('Create Exchange Rate', async ({page}) => {
    await page.goto(`${config.baseUrl}/admin/login`);
    await page.getByPlaceholder('Email Address').click();
    await page.getByPlaceholder('Email Address').fill(config.adminEmail);
    await page.getByPlaceholder('Password').click();
    await page.getByPlaceholder('Password').fill(config.adminPassword);
    await page.getByLabel('Sign In').click();
    await page.getByRole('link', { name: ' Settings' }).click();
    await page.getByRole('link', { name: 'Exchange Rates' }).click();
    await page.getByRole('button', { name: 'Create Exchange Rate' }).click();
    await page.getByText('Source Currency Target').click();
    await page.locator('select[name="target_currency"]').selectOption('8');
    await page.getByPlaceholder('Rate').click();
    await page.getByPlaceholder('Rate').fill('2323');
    await page.getByRole('button', { name: 'Save Exchange Rate' }).click();

    await page.waitForSelector('text=Exchange Rate Created Successfully', { timeout: 5000 });
});

test('Edit Exchange Rate', async ({page}) => {
    await page.goto(`${config.baseUrl}/admin/login`);
    await page.getByPlaceholder('Email Address').click();
    await page.getByPlaceholder('Email Address').fill(config.adminEmail);
    await page.getByPlaceholder('Password').click();
    await page.getByPlaceholder('Password').fill(config.adminPassword);
    await page.getByLabel('Sign In').click();
    await page.getByRole('link', { name: ' Settings' }).click();
    await page.getByRole('link', { name: 'Exchange Rates' }).click();
    await page.locator('div').filter({ hasText: /^1Canadian Dollar2323\.000000000000$/ }).locator('a').first().click();
    await page.getByText('Source Currency Target').click();
    await page.locator('select[name="target_currency"]').selectOption('8');
    await page.getByPlaceholder('Rate').click();
    await page.getByPlaceholder('Rate').fill('2323');
    await page.getByRole('button', { name: 'Save Exchange Rate' }).click();

    await page.waitForSelector('text=Exchange Rate Updated Successfully', { timeout: 5000 });
});

test('Delete Exchange Rate', async ({page}) => {
    await page.goto(`${config.baseUrl}/admin/login`);
    await page.getByPlaceholder('Email Address').click();
    await page.getByPlaceholder('Email Address').fill(config.adminEmail);
    await page.getByPlaceholder('Password').click();
    await page.getByPlaceholder('Password').fill(config.adminPassword);
    await page.getByLabel('Sign In').click();
    await page.getByRole('link', { name: ' Settings' }).click();
    await page.getByRole('link', { name: 'Exchange Rates' }).click();
    await page.locator('div').filter({ hasText: /^1Canadian Dollar2323\.000000000000$/ }).locator('a').nth(1).click();
    await page.getByRole('button', { name: 'Agree', exact: true }).click();

    await page.waitForSelector('text=Exchange Rate Deleted Successfully', { timeout: 5000 });
});
